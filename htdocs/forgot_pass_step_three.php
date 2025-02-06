<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$email = $_SESSION['email'] ?? '';
$error_message = $_SESSION['error_message'] ?? '';
$success_message = $_SESSION['success_message'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/images/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="./assets/images/favicon.svg">
    <link rel="shortcut icon" href="./assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="Xeorl">
    <link rel="manifest" href="./assets/images/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="assets/css/_forgot_pass.css">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200..1000&family=Work+Sans:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/_forgot_pass.css">
     <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5747712812070455" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="left-section">
        <div class="header">
            <h1 class="logo">Xeorl</h1>
            <button class="back-button" onclick="window.location.href='login.php';">Back to Login &rarr;</button>
        </div>
        <div class="content">
            <img id="background-image" src="assets/images/travel.jpg" alt="Background Image" class="background-img">
            <h2>Unlimited Shortens but,<br>One Link at a Time</h2>
        </div>
    </div>
    <div class="right-section">
        <div class="form-container">
            <h2>Create a New Password</h2>
            <p>Please choose a password that hasn't been used before. Must be at least 8 characters.</p>
            <?php if ($error_message): ?>
                <p class="error-message" style="color:red"><?= htmlspecialchars($error_message) ?></p>
            <?php endif; ?>
            <?php if ($success_message): ?>
                <p class="success-message"><?= htmlspecialchars($success_message) ?></p>
            <?php endif; ?>
            <form action="./core/forgot_pass_action_three.php" method="post">
                <input type="password" placeholder="Set new password" class="input-field full-width" name="newPassword" required minlength="8">
                <input type="password" placeholder="Confirm new password" class="input-field full-width" name="confirmPassword" required minlength="8">
                <button type="submit" class="submit-button">Reset Password</button>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/_forgot_pass.js"></script>
</body>
</html>
