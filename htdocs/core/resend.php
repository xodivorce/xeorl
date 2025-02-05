<?php
session_start();
require_once 'config.php';
require 'vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $otp = rand(100000, 999999);

    $sql = "UPDATE user SET user_otp = '$otp' WHERE user_email = '$email'";

    if (mysqli_query($conn, $sql)) {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['SMTP_USER'];
            $mail->Password = $_ENV['SMTP_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $_ENV['SMTP_PORT'];

            $mail->setFrom($_ENV['SMTP_USER'], 'Xeorl Support');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset - Xeorl';
            $mail->Body = 'Hello User,<br><br>Your one time password: <b>' . $otp . '</b>.<br><br>Your one-time password (OTP) is valid for a single session. If you refresh the page or exit the Next Step portal, you will need to regenerate a new OTP.<br><br>If you did not request this OTP, please contact us immediately at www.xeorl.buzz<br><br>Regards,<br>Xeorl<br>' . date("Y") . ' © All rights reserved';
            $mail->AltBody = 'Your OTP code is ' . $otp;

            $mail->send();
            $_SESSION['success_message'] = 'A new OTP has been sent to your email address.';
            header('Location: ../forgot_pass_step_two.php');
            exit;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Failed to update OTP in the database: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "No email found in session.";
}
?>
