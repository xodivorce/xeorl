<?php
// Start timer for debugging
$start_time = microtime(true);
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the environment variables and PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Database connection
require_once 'config.php';

$email = $_POST['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Generate a 6-digit OTP
    $otp = rand(100000, 999999);  // 6-digit OTP

    // Update the OTP in the database using mysqli
    $sql = "UPDATE user SET user_otp = '$otp' WHERE user_email = '$email'";

    if ($conn->query($sql) === TRUE) {
        // Send OTP email
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = $_ENV['SMTP_HOST']; // Set the SMTP server to send through
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

            $mail->send();
            // Redirect to ../forgot_pass_step_two.php
            session_start(); // Start the session
            $_SESSION['email'] = $email; // Store the email in the session
            header('Location: ../forgot_pass_step_two.php'); // Redirect to the next page
            exit; // Ensure no further script execution after redirection
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Failed to update OTP in the database.";
    }
} else {
    echo "Invalid email address.";
}
?>
