<?php
require 'core/process.php';
require 'core/get_statistics.php'; 

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xeorl - Link Shortener and Management Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Xeorl - The All-In-One, Fully Free to Use Advanced Link Shortener and Management Tool - Equipped with Multi-layered URL encryption, URL metadata remover, Mass shrinker, Quick link and Many more! - Powered by @xodivorce...">
    <meta name="google-adsense-account" content="ca-pub-5747712812070455">
    <link rel="icon" type="image/png" href="./assets/images/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="./assets/images/favicon.svg" />
    <link rel="shortcut icon" href="./assets/images/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Xeorl">
    <link rel="manifest" href="./assets/images/site.webmanifest" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/_home.css">
       <!-- Google Adsense -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5747712812070455" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "assets/_preloader.php" ?>
    <?php include "assets/_header.php"; ?>
    <main>
        <section class="shorten-section" style="user-select: none;">
            <h1>Open source inits.</h1>
            <h2>Lovingly hand-crafted.</h2>
            <p>Premium link shortening for use in web, iOS, Android, and desktop apps. Supported for urls. Completely open source, MIT licensed and built by <a href="https://www.xodivorce.in" target="_blank" class="custom-link">xodivorce</a>.</p>
            <div class="shorten-form">
                <input type="text" id="url-input" placeholder="Type a link...">
                <button id="shorten-btn">SHORTEN</button>
            </div>
            <div class="shortened-links">
                <h2>Your shortened links :</h2>
                <ul id="links-list"></ul>
            </div>
        </section>
        <section class="dashboard-stats-section" style="user-select: none;">
            <h1 class="section-heading">Numbers Speak For Themselves.</h1>
            <h2 class="section-subheading">Challenged By URLs, Defeated By None.</h2>
            <p class="section-paragraph">
                Even though we’re a growing community with a close-knit user base,
                our commitment to you is always personal. We’re here 24/7
                to support and resolve any issues you have because your satisfaction
                means everything to us. For any issues, email us at <a href="mailto:hey@xodivorce.in" class="contact-link">hey@xodivorce.in</a>.
            </p>
            <div class="dashboard-stats">
                <div class="stat-item">
                    <img src="assets/images/total.png" alt="Total Clicks" class="stat-icon total-icon">
                    <h3>Total Clicks</h3>
                    <p><?php echo 77467 + $total_clicks; ?></p>
                </div>
                <div class="stat-item">
                    <img src="assets/images/links.png" alt="Total Links" class="stat-icon links-icon">
                    <h3>Total URLs</h3>
                    <p><?php echo 9730 + $total_links; ?></p>
                </div>
                <div class="stat-item">
                    <img src="assets/images/users.png" alt="Active Users" class="stat-icon users-icon">
                    <h3>Register Users</h3>
                    <strong style="font-weight: bold; font-size: 1.5em;"><?php echo 3987 + $total_users; ?></strong>
                </div>
            </div>
        </section>
        <section class="how-to-start-section" style="user-select: none;">
            <h1 class="section-heading">Just Three Simple Steps</h1>
            <h2 class="section-subheading">How to Get Started?</h2>
            <p class="section-paragraph">Starting is easy! Follow these three simple steps to begin earning:</p>
            <div class="steps-list">
                <h3>1. Create an Account</h3>
                <p>Signing up with us is quick and completely free. Once registered, you’ll gain access to all our amazing features. Start your journey to simpler link management today!</p>
                <h3>2. Shorten Your Link</h3>
                <p>Turn long, cumbersome URLs into short, shareable links with ease. Our tool makes the process simple, fast, and entirely cost-free. Create customized links in seconds!</p>
                <h3>3. Earn Money</h3>
                <p>Share your shortened links with friends, family, or your audience. Each click earns you money, helping you generate income effortlessly. Start sharing today and see your earnings grow!</p>
            </div>
        </section>
    </main>
    <?php include 'assets/_cookies.php'; ?>
    <?php include 'assets/_footer.php'; ?>
    <script src="assets/js/_home.js"></script>
    <script src="assets/js/_developer_tools.js"></script>
</body>
</html>
