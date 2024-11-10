<?php

namespace App\Http\Controllers;

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
        // return view('checkout',compact('items')); 
        return view('paynow.paynow');
    }

    public function store_payment(Request $request){
        $testMsg = ''; 
        $request->validate([
            'email' => 'required',
            'phone_number' => 'required|starts_with:07',
            'amount' => 'required'
        ]);

        //data from the form
        $email = $request->email;
        $phone_number = $request->phone_number;
        $amount = $request->amount;
        $wallet = 'ecocash'; // this can be visa/mastercard/innbucks depending on what has been set by your Paynow subscription

        //paynow
        $paynow = new \Paynow\Payments\Paynow( 
            '19516',
            '5be861d3-8782-4468-8176-0d280e99f2c3',
            route('user.index'),
            'http://localhost:8000/cart/return?gateway=paynow',
        );

        $payment = $paynow->createPayment('Testing Fee', $email);
        $payment->add('Fee', $amount);
        $response = $paynow->sendMobile($payment, $phone_number, $wallet);
        $items = Cart::instance('cart')->content();

        // Check if the payment request was successful
        if ($response->success()) {
            // Get useful information from the response
           $paynowreference = $response->data()['paynowreference'];
            $link = $response->redirectUrl();
            $pollUrl = $response->pollUrl();
            $instructions = $response->instructions(); 
          
        // Build the message with line breaks 
            $testMsg = 'Payment successful!<br>';
            $testMsg .= 'Paynow Reference: ' . $paynowreference . '<br>';
            $testMsg = 'Payment successful!<br>';
            // $testMsg = 'Payment Reference : '. $response->paynowreference();
            $testMsg .= 'Redirect link: ' . $link . '<br>';
            $testMsg .= 'Poll URL: ' . $pollUrl . '<br>';
            $testMsg .= 'Instructions: ' . $instructions . '<br>';

            
            // Check the status of the transaction
            $status = $paynow->pollTransaction($pollUrl);
            //  return view('cart', compact('items', 'testMsg'));
            dd($status);
        }

        // If payment was not successful, handle failure and pass error message
        $testMsg = 'Payment failed: ' . $response->message();  // You can adjust this as needed to show a better error message
        // Return the view with failure message
        // return view('cart', compact('items', 'testMsg'));
        dd($response->data());
        // dd($testMsg);
    }
}
