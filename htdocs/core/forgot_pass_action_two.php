<?php
session_start();
require_once 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$email = $_SESSION['email'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userOtp = $_POST['otp'];

    if (!empty($email) && !empty($userOtp)) {
        $sql = "SELECT user_otp FROM user WHERE user_email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $dbOtp = $row['user_otp'];

            if ($userOtp == $dbOtp) {
                header('Location: ../forgot_pass_step_three.php');
                exit;
            } else {
                $_SESSION['error_message'] = "Invalid OTP. Please double-check the OTP.";
                header('Location: ../forgot_pass_step_two.php');
                exit;
            }
        } else {
            $_SESSION['error_message'] = "Failed to retrieve OTP from the database.";
            header('Location: ../forgot_pass_step_two.php');
            exit;
        }
    } else {
        $_SESSION['error_message'] = "Please fill out the OTP.";
        header('Location: ../forgot_pass_step_two.php');
        exit;
    }
}
?>
