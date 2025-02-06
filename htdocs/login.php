<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/images/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="./assets/images/favicon.svg">
    <link rel="shortcut icon" href="./assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="Xeorl">
    <link rel="manifest" href="./assets/images/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200..1000&family=Work+Sans:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/_login.css">
    <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5747712812070455" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "assets/_preloader.php" ?>
    <div class="container" style="user-select: none;">
        <div class="left-section">
            <div class="header">
                <h1 class="logo">Xeorl</h1>
                <button class="back-button" onclick="window.location.href='home.php';">Back to website &rarr;</button>
            </div>
            <div class="content">
                <img id="background-image" src="assets/images/travel.jpg" alt="Background Image" class="background-img">
                <h2>Unlocking Links,<br>One Link at a Time</h2>
            </div>
        </div>
        <div class="right-section">
            <div class="form-container">
                <h2>Login to your account</h2>
                <p>Don't have an account? <a href="register.php">Register</a></p>
                <form action="./core/login_action.php" method="post">
                    <input type="email" placeholder="Email" class="input-field full-width" name="user_email" required>
                    <div class="input-container">
                        <input type="password" placeholder="Enter your password" class="input-field full-width" id="password-field" name="user_pass" required>
                        <img src="assets/images/eye.svg" alt="Show Password" class="eye-icon" id="toggle-password">
                    </div>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "<div style='color: red; font-size: 14px; margin-top: -20px; margin-bottom: 3px;' class='error-message'>" . $_SESSION['error'] . "</div>";
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="checkbox-forgot-container">
                        <div class="checkbox-container">
                            <input type="checkbox" id="remember-me" class="custom-checkbox">
                            <label for="remember-me">Remember me for 30 days.</label>
                        </div>
                        <a href="forgot_pass_step_one.php" class="forgot-password-link">Forgot password?</a>
                    </div>
                    <p class="beta-notice">
                        This is a beta functionality. Please note that there are potential security concerns related to leaving your account logged in for long periods of time; especially when using an insecure, shared, or public device.
                    </p>
                    <button type="submit" class="submit-button" name="login_btn">Login</button>
                </form>
                <div class="divider">Or login with</div>
                <div class="social-login">
                    <button class="google-btn" onclick="window.location.href='core/redirect_google.php'">
                        <img src="assets/images/google.png" alt="Google Logo"> Google
                    </button>
                    <button class="apple-btn">
                        <img src="assets/images/apple.png" alt="Apple Logo"> Apple
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/_login.js"></script>
</body>
</html>
