<?php
session_start();
require_once 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];

if (isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if (strlen($newPassword) < 8) {
        $_SESSION['error_message'] = 'Password must be at least 8 characters long.';
        header('Location: ../forgot_pass_step_three.php');
        exit();
    }

    if ($newPassword !== $confirmPassword) {
        $_SESSION['error_message'] = 'Passwords do not match.';
        header('Location: ../forgot_pass_step_three.php');
        exit();
    }

    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    $sql = "UPDATE user SET user_pass = '$hashedPassword' WHERE user_email = '$email'";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../password_reset_success.php');
        exit();
    } else {
        $_SESSION['error_message'] = 'Failed to update the password. Please try again.';
        header('Location: ../forgot_pass_step_three.php');
        exit();
    }
} else {
    header('Location: ../forgot_pass_step_three.php');
    exit();
}
?>
