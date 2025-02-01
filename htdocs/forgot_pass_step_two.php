<?php
session_start(); // Start the session
$email = isset($_SESSION['email']) ? $_SESSION['email'] : ''; // Retrieve the email from the session
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
    <title>Enter Confirmation Code</title>
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

        <!-- Right Section (Form) -->
        <div class="right-section">
            <div class="form-container">
                <h2>Enter Confirmation Code</h2>
                <p>We sent a code to <strong id="userEmail"><?php echo htmlspecialchars($email); ?></strong></p>

                <form id="codeForm" action="./core/forgot_pass_action_two.php" method="post">
                    <!-- Input type set to 'tel' for numeric keyboard, with pattern for validation -->
                    <input type="tel" name="otp" pattern="[0-9]*" inputmode="numeric" placeholder="Enter 6-digit code" class="input-field full-width" maxlength="6" required>
                    <button type="submit" class="submit-button">Continue</button>
                </form>

                <div class="resend-code">
                    <p>Didn't receive the email? <a href="core/resend.php">Click to resend</a></p>
                </div>


                <div id="success-message" class="success-message">
                    <!-- Error message container -->
                    <?php if (isset($_SESSION['error_message'])): ?>
                        <div class="error-message" style="display: block; color: red; font-size: 14px; margin-top: 10px;">
                            <?php echo htmlspecialchars($_SESSION['error_message']);
                            unset($_SESSION['error_message']); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Success message container -->
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        echo '<span style="display: block; color: #4CAF50; font-size: 14px; margin-top: 10px;">' . htmlspecialchars($_SESSION['success_message']) . '</span>';
                        unset($_SESSION['success_message']);
                    }
                    ?>
                </div>


            </div>
        </div>
    </div>

    <script>
        // Pass the PHP email value to JavaScript and set it in the HTML
        document.getElementById('userEmail').textContent = "<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>";
    </script>

    <script src="assets/js/_forgot_pass.js"></script>

</body>

</html>