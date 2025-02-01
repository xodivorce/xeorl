<?php
require_once 'config.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $password = $_POST['user_pass'];

    // Check if the email exists
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE user_email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Check if the user is banned
        if ($row['user_type'] == 4) {
            $_SESSION['error'] = "Your account is banned. Please contact support.";
            header('Location: ../login.php');
            exit();
        }

        // Verify the password
        if (password_verify($password, $row['user_pass'])) {
            // Set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_email'] = $row['user_email'];
            $_SESSION['user_type'] = $row['user_type'];

            // Redirect to monetization after successful login
            header('Location: ../monetization.php');
            exit();
        } else {
            $_SESSION['error'] = "Invalid password. Please try again.";
            header('Location: ../login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Email not found. Please register.";
        header('Location: ../register.php');
        exit();
    }
}
?>