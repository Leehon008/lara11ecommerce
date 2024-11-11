<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;

class UserController extends Controller
{
    public function index()
    { 
        $orders = Order::orderby('id', 'Desc')->paginate(10); 
        foreach ($orders as $order) { 
            if ($order->cart_items) { 
               $cartItems = json_decode($order->cart_items, true); 
                $order->cart_item_count = count($cartItems);  
            } else {
                $order->cart_item_count = 0;  
            }
        } 
        return view('user.index', compact('orders'));
    }

     public function view_order($id)
    {
        $order = Order::find($id);
        return view('user.order_view', compact('order'));
    }

    public function editAccount()
    {
        // Retrieve the authenticated user
        $user = auth()->user();
        return view('user.account-details', compact('user'));
        
    }

    public function updateAccount(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'address' => 'nullable|string',
        ]);

        // Retrieve the authenticated user
        $user = auth()->user();

        // Update user details
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        // Redirect with success message
        return redirect()->route('user.account-details')->with('status', 'Account updated successfully!');

    }


}
