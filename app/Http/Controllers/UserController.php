<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        // $users = User::paginate(10);
        // return view('admin.users',compact('users'));
        return view('user.index');
    }

    public function editAccount()
    {
        // Retrieve the authenticated user
        $user = auth()->user();
        
        // Return the view with the user data
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
