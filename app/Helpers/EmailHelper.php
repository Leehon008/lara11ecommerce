<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendResetEmail($recipientEmail, $subject, $body)
{
    $mail = new PHPMailer(true);
    
    try {
        // SMTP Server Configuration
        $mail->isSMTP();
        $mail->Host = 'mail.bestforcreative.co.zw';      // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'no-reply@bestforcreative.co.zw'; // Your SMTP username
        $mail->Password = 'Ubbu@#s8fYhA';                 // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   // Enable SSL (use ENCRYPTION_STARTTLS for TLS)
        $mail->Port = 465;                                // TCP port to connect to (465 for SSL, 587 for TLS)

        // Email settings
        $mail->setFrom('no-reply@bestforcreative.co.zw', 'Best For Creative');
        $mail->addAddress($recipientEmail);               // Add a recipient
        $mail->Subject = $subject;
        $mail->isHTML(true);                              // Set email format to HTML
        $mail->Body = $body;

        $mail->send();
        return "Message has been sent successfully";
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
