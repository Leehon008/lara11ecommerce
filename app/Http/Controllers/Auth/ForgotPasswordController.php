<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    // Show the form where the user enters their email to request a reset link
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password'); // Adjust to the actual view path
    }

    // Step 1: Send reset link to email
public function sendResetLink(Request $request)
{
    // Validate the email
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    // Find the user
    $user = User::where('email', $request->email)->first();
    if (!$user) {
        return response()->json(['status' => 'error', 'message' => 'Invalid email address.'], 400);
    }

    // Generate a secure reset token
    $token = Str::random(60);

    // Save the token in the users table
    $user->remember_token = Hash::make($token);
    $user->save();

    // Define the reset link with the token as a URL parameter
    $resetLink = url("/reset-password?token={$token}&email=" . urlencode($request->email));

    // Compose the email message
    $subject = "Password Reset Request";
    $message = "Hello, \n\nWe received a request to reset your password. Click the link below to reset it:\n\n{$resetLink}\n\nIf you did not request this, please ignore this email.";

    // Set headers for security and formatting
    $headers = "From: no-reply@bestforcreative.co.zw\r\n";
    $headers .= "Reply-To: no-reply@bestforcreative.co.zw\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email using PHP's mail function
    if (mail($request->email, $subject, $message, $headers)) {
        return response()->json(['status' => 'success', 'message' => 'A reset link has been sent to your email address.']);
    } else {
        \Log::error('Failed to send password reset email.');
        return response()->json(['status' => 'error', 'message' => 'Failed to send the reset link. Please try again later.']);
    }
}



    // Email template with token link
    protected function resetPasswordEmailTemplate($token)
    {
        $resetLink = url('/reset-password?token=' . $token); // Adjust URL as needed
        return "Click the link to reset your password: <a href=\"$resetLink\">Reset Password</a>";
    }


    // Step 2: Show the reset password form with the token field

    public function showResetForm(Request $request)
    {
        $token = $request->query('token');
        if (!$token) {
            return redirect('/login')->with('message', 'Invalid password reset link.');
        }
        // Proceed with showing the form if token exists
        return view('auth.reset-password', ['token' => $token]);
    }

    // Step 3: Handle the password reset submission
public function updatePassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->token, $user->remember_token)) {
        return redirect()->back()->with('error', 'Invalid token or email.');
    }

    // Update user password
    $user->password = Hash::make($request->password);
    $user->remember_token = null; // Clear the token after resetting
    $user->save();

    return redirect('/login')->with('success', 'Password reset successful!');
}



}
