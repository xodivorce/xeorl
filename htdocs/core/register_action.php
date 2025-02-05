<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['user_agree'])) {
        $_SESSION['error'] = "You must agree to the Terms & Conditions.";
        header("Location: ../register.php");
        exit();
    }

    if (isset($_POST['submit_btn'])) {
        $fName = mysqli_real_escape_string($conn, $_POST['f_name']);
        $lName = mysqli_real_escape_string($conn, $_POST['l_name']);
        $email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $password = mysqli_real_escape_string($conn, $_POST['user_pass']);
        $uName = $fName . " " . $lName;
        $uType = 3;

        if (strlen($password) < 8) {
            $_SESSION['error'] = "Password must be at least 8 characters long.";
            header('Location: ../register.php');
            exit();
        }

        $checkEmail = "SELECT * FROM user WHERE user_email = '$email'";
        $result = $conn->query($checkEmail);

        if ($result->num_rows > 0) {
            $_SESSION['error'] = "Email already exists. Please use a different email.";
            header('Location: ../register.php');
            exit();
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO user (`user_name`, `user_email`, `user_pass`, `user_type`, `user_otp`) 
                    VALUES ('$uName', '$email', '$hashedPassword', '$uType', NULL)";

            if ($conn->query($sql) === TRUE) {
                $userId = $conn->insert_id;
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
}
?>
