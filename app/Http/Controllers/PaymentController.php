<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paynow\Payments\Paynow;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

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

public function handlePayment(Request $request)
{
    $customerContact = $request->input('email') ?? $request->input('phone');

    try {
        $paynow = new Paynow(
            env('PAYNOW_INTEGRATION_ID'),
            env('PAYNOW_INTEGRATION_KEY'),
            env('PAYNOW_RESULT_URL'),
            env('PAYNOW_RETURN_URL')
        );

        $payment = $paynow->createPayment('Invoice123', '0779013009');
        $payment->add('Product Name', 10.00);

        $response = $paynow->send($payment);

        if ($response->success()) {
            return response()->json(['redirectUrl' => $response->redirectUrl()]);
        } else {
            return response()->json(['error' => 'Payment failed'], 400);
        }
    } catch (\Exception $e) {
        Log::error('Payment Error: ' . $e->getMessage());
        return response()->json(['error' => 'An unexpected error occurred'], 500);
    }
}


    
//     public function paynow(Request $request)
// {
//     try {
//         $user = Auth::user();
//         $cartItems = Cart::where('user_id', $user->id)->get();
        
//         // Log cart items and user
//         Log::info('User: ' . $user->id);
//         Log::info('Cart Items: ' . $cartItems);

//         // Retrieve total from session
//         $total = Session::get('cart.total');
//         if (!$total) {
//             Log::error('Cart total not found in session.');
//             return redirect()->back()->with('error', 'Cart total not found.');
//         }

//         $paynow = new Paynow(
//             env('PAYNOW_INTEGRATION_ID'),
//             env('PAYNOW_INTEGRATION_KEY'),
//             env('PAYNOW_RESULT_URL'),
//             env('PAYNOW_RETURN_URL')
//         );

//         $payment = $paynow->createPayment('Order Payment', $user->mobile);
//         $payment->add('Cart Total', $total);

//         $response = $paynow->send($payment);

//         if ($response->success()) {
//             // Log Paynow response
//             Log::info('Paynow Response: ' . json_encode($response));

//             $order = Order::create([
//                 'user_id' => $user->id,
//                 'amount' => $total,
//                 'status' => 'Pending',
//                 'payment_method' => 'Paynow',
//                 'cart_items' => $cartItems->toJson(),
//                 'pollurl' => $response->pollUrl(),
//                 'reference' => $response->reference(),
//             ]);

//             foreach ($cartItems as $cartItem) {
//                 OrderItem::create([
//                     'order_id' => $order->id,
//                     'product_id' => $cartItem->product_id,
//                     'quantity' => $cartItem->quantity,
//                     'price' => $cartItem->price,
//                 ]);
//             }

//             Cart::where('user_id', $user->id)->delete();

//             return redirect()->away($response->redirectUrl());
//         } else {
//             Log::error('Paynow Payment Failed: ' . json_encode($response));
//             return redirect()->back()->with('error', 'Payment failed: ' . ($response->status ?? 'Unknown error'));
//         }
//     } catch (\Paynow\Payments\InvalidUrlException $e) {
//         Log::error('Invalid URL Exception: ' . $e->getMessage());
//         return redirect()->back()->with('error', 'Payment failed: Invalid URL - ' . $e->getMessage());
//     } catch (\Exception $e) {
//         Log::error('General Exception: ' . $e->getMessage());
//         return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
//     }
// }

public function paynow(Request $request)
{
    try {
        // Mock User and Payment Details
        $userEmail = 'testuser@example.com'; // Test email address
        $amount = 10.00; // Fixed amount for the mock payment

        // Initialize Paynow
        $paynow = new Paynow(
            env('PAYNOW_INTEGRATION_ID'),  // Your Paynow Integration ID
            env('PAYNOW_INTEGRATION_KEY'), // Your Paynow Integration Key
            env('PAYNOW_RESULT_URL'),      // URL for Paynow result notifications
            env('PAYNOW_RETURN_URL')       // URL for Paynow return after payment
        );

        // Create a Payment with test details
        $payment = $paynow->createPayment('Test Payment', $userEmail);
        $payment->add('Test Item', $amount);

        // Send Payment to Paynow
        $response = $paynow->send($payment);

        // Check if Paynow Response is Successful
        if ($response->success()) {
            // Log the success response
            Log::info('Paynow Mock Payment Successful: ' . json_encode($response));

            // Redirect the user to the Paynow payment page
            return redirect()->away($response->redirectUrl());
        } else {
            // Log the error if the response failed
            Log::error('Paynow Payment Error: ' . $response->error());

            return redirect()->back()->with('error', 'Payment initiation failed. Please try again.');
        }
    } catch (\Paynow\Payments\InvalidUrlException $e) {
        // Handle invalid URL exception
        Log::error('Paynow Invalid URL Exception: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Invalid URL: ' . $e->getMessage());
    } catch (\Exception $e) {
        // Handle general exceptions
        Log::error('General Exception: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
    }
}




    public function paymentOnDelivery(Request $request)
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Retrieve total from session
        $total = Session::get('cart.total');
        
        if (!$total) {
            return redirect()->back()->with('error', 'Cart total not found.');
        }

        $order = Order::create([
            'user_id' => $user->id,
            'amount' => $total,
            'status' => 'Pending',
            'payment_method' => 'COD',
            'cart_items' => $cartItems->toJson(),
        ]);

        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
            ]);
        }

        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('home.index')->with('status', 'Order placed successfully! Pay on delivery.');
    }

    public function result(Request $request)
    {
        try {
            $paynow = new Paynow(
                env('PAYNOW_INTEGRATION_ID'),
                env('PAYNOW_INTEGRATION_KEY'),
                env('PAYNOW_RESULT_URL'),
                env('PAYNOW_RETURN_URL')
            );

            $pollUrl = $request->input('pollurl');
            $status = $paynow->pollTransaction($pollUrl);

            // Check if payment was successful
            if ($status->paid()) {
                $order = Order::where('pollurl', $pollUrl)->first();
                $order->update(['status' => 'Paid']);
                return redirect()->route('home.index')->with('status', 'Payment successful!');
            } else {
                return redirect()->route('home.index')->with('error', 'Payment failed. Please try again.');
            }
        } catch (\Exception $e) {
            Log::error('Paynow result error: ' . $e->getMessage());
            return redirect()->route('home.index')->with('error', 'An error occurred while processing the payment. Please try again.');
        }
    }

    public function return(Request $request)
    {
        return redirect()->route('home.index')->with('status', 'Payment process completed.');
    }
}
