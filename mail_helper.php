<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust path if not using Composer

function sendWelcomeEmail($userEmail, $userName) {
    $mail = new PHPMailer(true);

    try {
        // --- Server Settings ---
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';               // Using Gmail SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'thamarairajanpandiyarajan@gmail.com';         // Your Gmail address
        $mail->Password   = 'Harish@567';            // Google App Password (NOT your login password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // --- Recipients ---
        $mail->setFrom('no-reply@apexsyntax.com', 'Apex Syntax');
        $mail->addAddress($userEmail, $userName);

        // --- Content ---
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to Apex Syntax!';
        
        // Tailwind-inspired HTML Email Template
        $mail->Body = "
            <div style='font-family: sans-serif; padding: 20px; background-color: #f4f4f4;'>
                <div style='max-width: 600px; margin: auto; background: #ffffff; padding: 30px; border-radius: 10px; border: 1px solid #ddd;'>
                    <h2 style='color: #0ea5e9;'>Welcome to the community, $userName!</h2>
                    <p style='color: #333; line-height: 1.6;'>
                        Thank you for joining <strong>Apex Syntax</strong>. We're excited to help you build better logic and cleaner code.
                    </p>
                    <p>Your account is now active. You can start exploring our AI assistant and development tools right away.</p>
                    <div style='margin-top: 30px;'>
                        <a href='https://your-site.com/login' style='background-color: #0ea5e9; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;'>Go to Dashboard</a>
                    </div>
                    <hr style='margin-top: 40px; border: 0; border-top: 1px solid #eee;'>
                    <p style='font-size: 12px; color: #888;'>If you didn't create an account, you can safely ignore this email.</p>
                </div>
            </div>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        // Log the error for debugging
        error_log("Mail Error: {$mail->ErrorInfo}");
        return false;
    }
}