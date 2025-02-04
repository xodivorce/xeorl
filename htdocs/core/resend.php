<?php
// Start the session
session_start();

// Include necessary files
require_once 'config.php';  // Ensure this is your mysqli connection file
require 'vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

// Load environment variables using Dotenv
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Check if the email is stored in the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Generate a new 6-digit OTP
    $otp = rand(100000, 999999);  // Change this to generate a 6-digit OTP

    // Update the OTP in the database for the user using mysqli
    $sql = "UPDATE user SET user_otp = '$otp' WHERE user_email = '$email'";

    if (mysqli_query($conn, $sql)) {
        // Send the OTP to the user's email
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = $_ENV['SMTP_HOST']; // SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['SMTP_USER']; // SMTP username
            $mail->Password   = $_ENV['SMTP_PASS']; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $_ENV['SMTP_PORT'];

            // Recipients
            $mail->setFrom($_ENV['SMTP_USER'], 'Xeorl Support');
            $mail->addAddress($email); // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset - Xeorl';
            $mail->Body    = 
            'Hello User,<br><br>
            Your one time password: <b>' . $otp . '</b>.<br><br>
            
            Your one-time password (OTP) is valid for a single session. If you refresh the page or exit the Next Step portal, you will need to regenerate a new OTP.<br><br>

            If you did not request this OTP, please contact us immediately at www.xeorl.buzz<br><br>
            
            Regards,<br>
            Xeorl<br>
            ' . date("Y") . ' © All rights reserved';

            $mail->AltBody = 'Your OTP code is ' . $otp;

            // Send the email
            $mail->send();
            $_SESSION['success_message'] = 'A new OTP has been sent to your email address.';
            header('Location: ../forgot_pass_step_two.php'); // Redirect back to the confirmation page
            exit;

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Failed to update OTP in the database: " . mysqli_error($conn);
    }

    // Close the MySQLi statement
    mysqli_close($conn);
} else {
    echo "No email found in session.";
}
?>
