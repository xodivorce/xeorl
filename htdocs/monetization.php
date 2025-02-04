<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="UTF-8">
    <title>Monetization</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Xeorl - The All-In-One, Fully Free to Use Advanced Link Shortener and Management Tool - Equipped with Multi-layered URL encryption, URL metadata remover, Mass shrinker, Quick link and Many more! - Powered by @xodivorce...">
    <link rel="icon" type="image/png" href="./assets/images/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="./assets/images/favicon.svg" />
    <link rel="shortcut icon" href="./assets/images/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Xeorl">
    <link rel="manifest" href="./assets/images/site.webmanifest" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/_monetization.css">
</head>
<body>
<?php include "assets/_header.php"; ?>
<main>
    <h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
    <p>Email: <?php echo $_SESSION['user_email']; ?></p>
    <a href="logout.php">Logout</a>
</main>
<?php include "assets/_footer.php"; ?>
</body>
</html>
