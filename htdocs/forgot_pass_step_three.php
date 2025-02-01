<?php
// Start the session to access session variables
session_start();
$email = isset($_SESSION['email']) ? $_SESSION['email'] : ''; // Get the email from the session

// Display any error or success message if set in session
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/images/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="./assets/images/favicon.svg" />
    <link rel="shortcut icon" href="./assets/images/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Xeorl">
    <link rel="manifest" href="./assets/images/site.webmanifest" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Reset Password</title>
    <link rel="stylesheet" href="assets/css/_forgot_pass.css">
</head>
<body>
<div class="container">
    <!-- Left Section (Image and Logo) -->
    <div class="left-section">
        <div class="header">
        <h1 class="logo">Xeorl</h1>
            <button class="back-button" onclick="window.location.href='login.php';">Back to Login &rarr;</button>
        </div>
        <div class="content">
            <img id="background-image" src="assets/images/travel.jpg" alt="Background Image" class="background-img">
            <h2>Unimited Shortens but,<br>One Link at a Time</h2>
        </div>
    </div>

    <!-- Right Section (Create Password Form) -->
    <div class="right-section">
        <div class="form-container">
            <h2>Create a New Password</h2>
            <p>Please choose a password that hasn't been used before. Must be at least 8 characters.</p>

            <!-- Display success or error message -->
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
