<?php
include('config.php');
session_start(); // Start the session for storing error messages
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit_btn'])) {
    $fName = mysqli_real_escape_string($conn, $_POST['f_name']);
    $lName = mysqli_real_escape_string($conn, $_POST['l_name']);
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $password = mysqli_real_escape_string($conn, $_POST['user_pass']); // Plain text password
    $uName = $fName . " " . $lName;
    $uType = 3; // Default user type (can be changed as per requirements)

    // Check if password is at least 8 characters long
    if (strlen($password) < 8) {
        $_SESSION['error'] = "Password must be at least 8 characters long.";
        header('Location: ../register.php'); // Redirect to the register page
        exit();
    }

    // Check if email already exists
    $checkEmail = "SELECT * FROM user WHERE user_email = '$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        // Store the error message in the session
        $_SESSION['error'] = "Email already exists. Please use a different email.";
        header('Location: ../register.php'); // Redirect to the register page
        exit();
    } else {
        // Hash the password before storing it
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert the user data with hashed password
        $sql = "INSERT INTO user (`user_name`, `user_email`, `user_pass`, `user_type`, `user_otp`) 
                VALUES ('$uName', '$email', '$hashedPassword', '$uType', NULL)";

        if ($conn->query($sql) === TRUE) {
            // Get the user ID of the newly registered user
            $userId = $conn->insert_id;

            // Optionally, send an email or OTP for verification here

            // Redirect to login page after successful registration
            header('Location: ../login.php');
            exit();
        } else {
            $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
            header('Location: ../register.php');
            exit();
        }
    }
}

$conn->close();
?>
