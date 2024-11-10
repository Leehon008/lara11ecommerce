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
        // return view('checkout',compact('items')); 
        return view('paynow.paynow');
    }

    public function store_payment(Request $request)
    {
        // Default message for response
        $testMsg = '';
        // Get cart items
        $items = Cart::instance('cart')->content();

        // Validate the input
        $request->validate([
            'email' => 'required|email',
            'phone_number' => 'required|starts_with:07',
            'amount' => 'required|numeric',
        ]);

        // Data from the form
        $email = $request->email;
        $phone_number = $request->phone_number;
        $amount = $request->amount;
        $wallet = 'ecocash'; // this can be visa/mastercard/innbucks depending on what has been set by your Paynow subscription

        // Paynow setup
        $paynow = new \Paynow\Payments\Paynow( 
            '19516',  // Merchant ID
            '5be861d3-8782-4468-8176-0d280e99f2c3',  // Merchant Key
            route('user.index'), // Success URL
            route('user.index')  // Failure URL
        );

        // Create the payment
        $payment = $paynow->createPayment('Testing Fee', $email);
        $payment->add('Fee', $amount);

        // Send mobile payment request
        $response = $paynow->sendMobile($payment, $phone_number, $wallet);

        // Check if the payment request was successful
        if ($response->success()) {
            // Get useful information from the response
            $paynowreference = $response->data()['paynowreference'];  // Accessing paynowreference from the data method
            $link = $response->redirectUrl();
            $pollUrl = $response->pollUrl();
            $instructions = $response->instructions();

            // Build the message with line breaks
            $testMsg = 'Payment successful!<br>';
            $testMsg .= 'Paynow Reference: ' . $paynowreference . '<br>';
            $testMsg .= 'Redirect link: ' . $link . '<br>';
            $testMsg .= 'Poll URL: ' . $pollUrl . '<br>';
            $testMsg .= 'Instructions: ' . $instructions . '<br>';

            // Return the view with response data and cart items
            return view('order_confirmation', compact('items', 'testMsg'));
        }

        // If payment was not successful, handle failure and pass error message
        $testMsg = 'Payment failed: ' . $response->message();  // You can adjust this as needed to show a better error message
        
        // Return the view with failure message
        return view('order_confirmation', compact('items', 'testMsg'));
    } 
}
