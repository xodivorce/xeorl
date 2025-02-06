<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['redirect_url'])) {
    http_response_code(400);
    die("Invalid request! The page you are looking for may have been deleted or removed from our server.");
}

$redirect_url = $_SESSION['redirect_url'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xeorl - Unzipper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Xeorl - The All-In-One, Fully Free to Use Advanced Link Shortener and Management Tool - Equipped with Multi-layered URL encryption, URL metadata remover, Mass shrinker, Quick link and Many more! - Powered by @xodivorce...">
    <link rel="icon" type="image/png" href="./assets/images/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="./assets/images/favicon.svg">
    <link rel="shortcut icon" href="./assets/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png">
    <meta name="apple-mobile-web-app-title" content="Xeorl">
    <link rel="manifest" href="./assets/images/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/_unzipper.css">
    <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5747712812070455" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "assets/_header.php"; ?>
    <div class="max-container">
        <div class="container">
            <h2>Your link is almost ready.</h2>
            <div class="countdown-wrapper">
                <div class="countdown">
                    <span id="timer">10</span><br>Seconds
                </div>
            </div>
            <button id="getLinkBtn" disabled onclick="redirect()">PLEASE WAIT...</button>
        </div>
    </div>
    <?php include "assets/_cookies.php"; ?>
    <?php include "assets/_footer.php"; ?>
    <script>
        const redirectUrl = "<?php echo $redirect_url; ?>";
    </script>
    <script src="assets/js/_developer_tools.js"></script>
    <script src="assets/js/_unzipper.js"></script>
</body>
</html>
