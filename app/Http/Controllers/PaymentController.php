<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paynow\Payments\Paynow;
use App\Models\Order;
use App\Models\OrderItem;
// use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str; 

class PaymentController extends Controller
{
    public function checkout()
{
    $user = Auth::user();
    $cartItems = Cart::where('user_id', $user->id)->get();
    $total = $cartItems->sum(function ($cartItem) {
        return $cartItem->price * $cartItem->quantity;
    });

    Session::put('cart.total', $total);

    return view('checkout', compact('cartItems', 'total'));
}


    public function paynow(Request $request)
{
    logger('starting paynow ...',['success:' => '$request']);
    try {
        $userEmail = auth()->user()->email; // Get authenticated user email
        $items = Cart::instance('cart')->content(); // Get cart items
        $amount = Cart::instance('cart')->total();  // Total amount from the cart

        $paynow = new Paynow(
            env('PAYNOW_INTEGRATION_ID'),
            env('PAYNOW_INTEGRATION_KEY'), 
            route('home.index'), // Success URL
            route('home.index') 
            // env('PAYNOW_RESULT_URL'),
            // env('PAYNOW_RETURN_URL')
        );

        $payment = $paynow->createPayment('Order-' . uniqid(), $userEmail);        
        $payment->add('test code', $amount);     
        $response = $paynow->send($payment);

        logger('paynow response....',['error:' => $response]);
        if ($response->success()) {
            Cart::instance('cart')->destroy(); 
            session()->flush();
            return redirect()->away($response->redirectUrl());
        } else {
           logger('testing paynow failed',['error:' => '$e->getMessage()']);
            return redirect()->back()->with('error', 'Payment initiation failed.');
        }
    } catch (\Exception $e) {
        logger('paynow failed with ',['error:' => $e->getMessage()]);
        return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
    }
}

public function paymentOnDelivery(Request $request)
{
    try {
        if (Cart::instance('cart')->count() == 0) {
            return redirect()->back()->with('error', 'Your cart is empty. Please add items to place an order.');
        }
        logger('Cart Contents:', Cart::instance('cart')->content()->toArray());

        // Calculate subtotal and tax
        $subtotal = Cart::instance('cart')->subtotal();
        $tax = $subtotal * 0.15; // Assuming 15% tax
        $totalAmount = $subtotal + $tax;

        $paymentReference = $this->generateUniqueReference();

        // Create an order with payment method as 'Pay on Delivery'
        $cartItems = Cart::instance('cart')->content()->map(function ($item) {
            return [
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price, 
                'subtotal' => $item->subTotal(),
            ];
        });

        $order = Order::create([
            'user_id' => auth()->id(), // Logged-in user
            'paynowreference' => $paymentReference, // Use the generated payment reference
            'reference' => 'Ref-' . $paymentReference, // Add prefix to the reference
            'amount' => $totalAmount,
            'subTotal' => $subtotal,
            'tax' => $tax,
            'status' => 'pending',
            'payment_method' => 'delivery',
            'pollurl' => '', // Add your poll URL logic if needed
            'cart_items' => json_encode($cartItems) // Store cart items as a JSON string
        ]);

        // Save each cart item as an order item
        foreach (Cart::instance('cart')->content() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'price' => $item->price,
            ]);
        }

        // Clear the cart after saving
        Cart::instance('cart')->destroy(); 
        session()->flush();
        // Build the message with line breaks
        $testMsg = 'Payment for ' .'<br>'; 
        $testMsg .= 'Order '. $order->id .' placed successfully. Please pay upon delivery.' ; 
        // Redirect to order confirmation with a success message        
        return view('order_confirmation',compact('order','cartItems','testMsg')); 
    } catch (\Exception $e) {
        // Log the error for debugging
        logger('Error in paymentOnDelivery:', ['error' => $e->getMessage()]);

        return redirect()->back()
            ->with('error', 'An unexpected error occurred: ' . $e->getMessage());
    }
}

/**
 * Generate a unique payment reference.
 * @return string
 */
public function generateUniqueReference()
{ 
    $timestamp = date('YmdHis');
    $randomNumber = rand(1000, 9999);
    $reference = strtoupper('PAY-' . $timestamp . '-' . $randomNumber);
    return $reference;
}




    public function result(Request $request)
{
    try {
        // Initialize Paynow
        $paynow = new Paynow(
            env('PAYNOW_INTEGRATION_ID'),
            env('PAYNOW_INTEGRATION_KEY'),
            env('PAYNOW_RESULT_URL'),
            env('PAYNOW_RETURN_URL')
        );

        // Get the poll URL from the request
        $pollUrl = $request->input('pollurl');
        if (!$pollUrl) {
            return redirect()->route('cart.order.failed')->with('error', 'Invalid payment verification link.');
        }

        // Poll the transaction status
        $status = $paynow->pollTransaction($pollUrl);

        // Check if the payment was successful
        if ($status->paid()) {
            // Find the order associated with the poll URL
            $order = Order::where('pollurl', $pollUrl)->first();

            if (!$order) {
                return redirect()->route('cart.order.failed')->with('error', 'Order not found. Please contact support.');
            }

            // Update the order status
            $order->update(['status' => 'Paid']);

            // Process cart items into order_items table
            foreach (Cart::instance('cart')->content() as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                ]);
            }

            // Clear the cart
            Cart::instance('cart')->destroy();

            // Redirect to order confirmation
            return redirect()->route('cart.order.confirmation')->with('success', 'Payment successful! Your order has been placed.');
        } else {
            // Handle failed payment
            return redirect()->route('cart.order.failed')->with('error', 'Payment failed. Please try again or contact support.');
        }
    } catch (\Exception $e) {
        // Log the error for debugging
        Log::error('Paynow result error: ', ['exception' => $e]);

        // Redirect to a user-friendly error page
        return redirect()->route('cart.order.failed')->with('error', 'An unexpected error occurred while processing your payment. Please contact support.');
    }
}


    public function return(Request $request)
{
    try {
        // Optionally, validate the request or perform additional checks
        return redirect()->route('cart.order.confirmation')->with('success', 'You will receive an email confirmation shortly.');
    } catch (\Exception $e) {
        Log::error('Paynow return error: ', ['exception' => $e]);

        // Redirect to a safe fallback in case of issues
        return redirect()->route('cart.order.failed')->with('error', 'An error occurred. Please contact support.');
    }
}

}
