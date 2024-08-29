<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xeorl - Shorten your links</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>
    <main>
        <section class="shorten-section">
            <h1>Open source inits.</h1>
            <h2>Lovingly hand-crafted.</h2>
            <p>Premium link shortening for use in web, iOS, Android, and<br>
            desktop apps. Supported for urls. Completely open source, MIT<br> 
            licensed and built by <a href="https://www.xodivorce.in" target="_blank" class="custom-link">xodivorce</a>.</p>
            <div class="shorten-form">
                <input type="text" id="url-input" placeholder="Type a link...">
                <button id="shorten-btn">SHORTEN</button>
            </div>
            <div class="shortened-links">
                <h2>Your shortened links :</h2>
                <ul id="links-list">
                    <li>
                        <div class="link-icon">
                            <img src="assets/images/url.png" class="logo-img">
                        </div>
                        <div class="link-info">
                            <span class="short-link">xeorl.com/WAXD</span>
                            <span class="long-link">https://www.example.com/very-long-url-that-needs-shortening</span>
                        </div>
                        <button class="copy-btn">
                            <img src="assets/images/copy.png">
                        </button>
                        <button class="delete-btn">
                            <img src="assets/images/delete.png">
                        </button>
                    </li>
                </ul>
            </div>
        </section>
    </main>
    <?php include 'footer.php'; ?>
<script src="assets/js/home.js"></script>
</body>
</html>
