<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index() {
        $items = Cart::instance('cart')->content();
        return view('cart',compact('items'));
    }

    public function add_to_cart(Request $request) {
        Cart::instance('cart')->add($request->id,$request->name,$request->quantity,$request->price)->associate('App\Models\Product');
        return redirect()->back();
    }

    public function increase_cart_qty($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back();
    }

    public function decrease_cart_qty($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        return redirect()->back();
    }

    public function remove_item($rowId) {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }
    
    public function create_payment() {
         $items = Cart::instance('cart')->content();
        return view('checkout',compact('items')); 
        // return view('paynow.paynow');
    }

    public function store_payment() 
    { 
        $user = Auth::user(); // Retrieve the authenticated user
        $items = Cart::instance('cart')->content();// Get cart items

        // Data from the form
        $email = 'bestofcreative101@gmail.com'; //$request->email;
        $phone_number = '0771111111'; //$request->phone_number;
        $amount =  Cart::instance('cart')->total();
        $subTotal =   Cart::instance('cart')->subTotal();
        $tax =    Cart::instance('cart')->tax();
        $wallet = 'ecocash'; // this can be visa/mastercard/innbucks depending on what has been set by your Paynow subscription

        // Paynow setup
        $paynow = new \Paynow\Payments\Paynow( 
            '19516',  // Merchant ID
            '5be861d3-8782-4468-8176-0d280e99f2c3',  // Merchant Key
            route('user.index'), // Success URL
            route('user.index')  // Failure URL
        );

        // Create the payment
        $payment = $paynow->createPayment('Payment via Paynow Details', $email);
        $payment->add('Fee', $amount);

        // Send mobile payment request
        $response = $paynow->sendMobile($payment, $phone_number, $wallet);

        // Check if the payment request was successful
        if ($response->success()) {
            // Get useful information from the response
            $paynowreference = $response->data()['paynowreference']; 
            $link = $response->redirectUrl();
            $pollUrl = $response->pollUrl();
            $instructions = $response->instructions();

            // Poll the transaction status
            $statusResponse = $paynow->pollTransaction($pollUrl); // This returns a StatusResponse object
            $statusData = $statusResponse->data();

            // Check if the polling request was successful
            if ($statusResponse->status() == 'sent') {  
                
                $order = Order::create([
                    'user_id' => $user->id, //logged in user
                    'paynowreference' => $statusData['paynowreference'],
                    'reference' => $statusData['reference'],
                    'amount' => $amount,
                    'subTotal' => $subTotal,
                    'tax' => $tax,
                    'status' => $statusData['status'],
                    'payment_method'=>$wallet,
                    'pollurl' => $statusData['pollurl']
                ]);

                // Build the message with line breaks
                $testMsg = 'Payment successful!'. $order->paynowreference;
                return view('order_confirmation', compact('items','order',  'testMsg'));  
            } else {
                // Handle the failure case (if transaction status is not sent)
                $testMsg = 'Transaction failed: ' . $statusResponse->errors();
                return redirect()->route('cart.index')->with([
                    'items' => $items,
                    'testMsg' => $testMsg
                ]);
            } 
        }

        // If payment was not successful, handle failure and pass error message
        $testMsg = 'Payment failed: ' . $response->errors(); 
        return redirect()->route('cart.index')->with([
            'items' => $items,
            'testMsg' => $testMsg
        ]); 
    }
}
