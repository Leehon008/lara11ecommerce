<?php
function resetPasswordEmailTemplate($token)
{
    $resetLink = url("/reset-password?token=$token");

    return "
        <h1>Reset Your Password</h1>
        <p>Click the link below to reset your password:</p>
        <a href='$resetLink'>$resetLink</a>
        <p>If you did not request a password reset, please ignore this email.</p>
    ";
}
