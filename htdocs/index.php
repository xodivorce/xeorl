<?php
require 'core/process.php';
require 'core/get_statistics.php';  // Include the statistics file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xeorl - Link Shortener and Management Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Xeorl - The All-In-One, Fully Free to Use Advanced Link Shortener and Management Tool - Equipped with Multi-layered URL encryption, URL metadata remover, Mass shrinker, Quick link and Many more! - Powered by @xodivorce...">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/_home.css">
</head>
<?php
include "assets/_header.php";
?>
<body>
    
    <main>
        <!-- Shorten Section -->
        <section class="shorten-section">
            <h1>Open source inits.</h1>
            <h2>Lovingly hand-crafted.</h2>
            <p>Premium link shortening for use in web, iOS, Android, and<br> desktop apps. Supported for urls. Completely open source, MIT<br> licensed and built by <a href="https://www.xodivorce.in" target="_blank" class="custom-link">xodivorce</a>.</p>
            <div class="shorten-form">
                <input type="text" id="url-input" placeholder="Type a link...">
                <button id="shorten-btn">SHORTEN</button>
            </div>
            <div class="shortened-links">
                <h2>Your shortened links :</h2>
                <ul id="links-list">
                    <?php
                    $sql2 = mysqli_query($conn, "SELECT * FROM url ORDER BY id DESC");
                    if (mysqli_num_rows($sql2) > 0) {
                        while ($row = mysqli_fetch_assoc($sql2)) {
                            $short_url = $domain . $row['shorten_url'];
                            echo '<li>';
                            echo '<div class="link-icon"><img src="assets/images/url.png" class="url-img"></div>';
                            echo '<div class="link-info">';
                            echo '<span class="short-link">' . $short_url . '</span>';
                            echo '<span class="long-link">' . $row['full_url'] . '</span>';
                            echo '</div>';
                            echo '<button class="copy-btn"><img src="assets/images/copy.png"></button>';
                            echo '<button class="delete-btn"><img src="assets/images/delete.png"></button>';
                            echo '</li>';
                        }
                    } else {
                        // No shortened links found
                        echo '<li>';
                        echo '<div class="link-icon"><img src="assets/images/url.png" class="url-img"></div>';
                        echo '<div class="link-info">';
                        echo '<span class="short-link"">xeorl.buzz/*****</span>';
                        echo '<span class="long-link">You don\'t have any shortened links</span>';
                        echo '</div>';
                        echo '<button class="copy-btn"><img src="assets/images/copy.png"></button>';
                        echo '<button class="delete-btn"><img src="assets/images/delete.png"></button>';
                        echo '</li>';
                        
                    }
                    ?>
                </ul>
            </div>
        </section>

        <!-- Dashboard Statistics Section -->
        <section class="dashboard-stats-section">
        <h1 class="section-heading">Numbers Speak For Themselves.</h1>
        <h2 class="section-subheading">Challenged By URLs, Defeted By None.</h2>
        <p class="section-paragraph">
    Even though we’re a growing community with a close-knit user base,<br>
    our commitment to you is always personal. We’re here 24/7<br>
    to support and resolve any issues you have because your satisfaction<br>
    means everything to us. For any issues, email us at <a href="mailto:hey@xodivorce.in" class="contact-link">hey@xodivorce.in</a>.
</p>



        <section class="dashboard-stats">
            <div class="stat-item">
                <img src="assets/images/links.png" alt="Total Links" class="stat-icon links-icon">
                <h3>Total URLs</h3>
                <p><?php echo $total_links; ?></p>
            </div>
            <div class="stat-item">
                <img src="assets/images/total.png" alt="Total Clicks" class="stat-icon total-icon">
                <h3>Total Clicks</h3>
                <p><?php echo $total_clicks; ?></p>
            </div>
            <div class="stat-item">
                <img src="assets/images/users.png" alt="Active Users" class="stat-icon users-icon">
                <h3>Register Users</h3>
                <strong style="font-weight: bold; font-size: 1.5em;"><?php echo "2,407"; ?></strong>
            </div>
        </section>
    </section>
    </main>

    <?php include 'assets/_footer.php'; ?>
    <script src="assets/js/_home.js"></script>
    <script src="assets/js/developer_tools.js"></script>
</body>
</html>
