<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/images/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="./assets/images/favicon.svg">
    <link rel="shortcut icon" href="./assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="Xeorl">
    <link rel="manifest" href="./assets/images/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/_register.css">
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
                <h2>Capturing Links,<br>One Link at a Time</h2>
            </div>
        </div>
        <div class="right-section">
            <div class="form-container">
                <h2>Create an account</h2>
                <p>Already have an account? <a href="login.php">Log in</a></p>
                <form action="./core/register_action.php" method="post">
                    <div class="input-container">
                        <input type="text" placeholder="First name" class="input-field" name="f_name">
                        <input type="text" placeholder="Last name" class="input-field" name="l_name">
                    </div>
                    <input type="email" placeholder="Email" class="input-field full-width" name="user_email">
                    <div class="input-container">
                        <input type="password" placeholder="Enter your password" class="input-field full-width" id="password-field" name="user_pass">
                        <img src="assets/images/eye.svg" alt="Show Password" class="eye-icon" id="toggle-password">
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div style="color: red; font-size: 14px; margin-top: -24px; margin-bottom: 7px;">
                            <?= $_SESSION['error'] ?>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>
                    <div class="checkbox-container">
                        <input type="checkbox" id="agree" class="custom-checkbox" name="user_agree" value="1">
                        <label for="agree">I agree to the <a href="https://docs.google.com/document/d/1QcUohit6U3ZmWyOZbggbpUr2KrQ6pwy3X-R4zUGfZBo/edit?usp=sharing" class="terms-link">Terms & Conditions</a></label>
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div id="error-message" style="color: red; font-size: 14px; margin-top: 5px;">
                            <?= $_SESSION['error'] ?>
                        </div>
                        <?php unset($_SESSION['error']); ?>
                    <?php else: ?>
                        <div id="error-message" style="color: red; font-size: 14px; margin-top: 5px; display: none;"></div>
                    <?php endif; ?>
                    <button type="submit" class="submit-button" name="submit_btn">Create account</button>
                </form>
                <div class="divider">Or register with</div>
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
    <script src="assets/js/_register.js"></script>
    <script src="assets/js/_developer_tools.js"></script>
</body>
</html>
