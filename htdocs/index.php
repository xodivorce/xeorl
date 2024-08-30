<?php

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the configuration file
include "core/config.php";
// Start session management
session_start();

// Include Composer's autoloader
require_once __DIR__ . '/core/vendor/autoload.php';


// Initialize dotenv and load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Retrieve environment variables
$domain = $_ENV['DOMAIN'];
$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db = $_ENV['DB_NAME'];

// Establish database connection
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Database connection error: " . mysqli_connect_error());
}

// Set a cookie to track user visits or preferences
$cookie_name = "user_visited";
$cookie_value = "true";
$cookie_expire_time = time() + (86400 * 30); // Cookie expires in 30 days
setcookie($cookie_name, $cookie_value, $cookie_expire_time, "/"); // The "/" makes the cookie available across the entire website

// Check if the cookie exists
if (isset($_COOKIE[$cookie_name])) {
    // Cookie exists, you can execute specific logic like tracking the visit
} else {
    // Cookie does not exist, handle the first-time visit
}

// Set session data for the user
$_SESSION['user'] = "unique_user_id"; // Store unique user ID in session

// Retrieve and use session data
if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user'];
    // Do something with $user_id, like loading user-specific data
}

// Initialize the shortened URL variable
$new_url = "";

// Check if there's a GET request and process the shortened URL
if (isset($_GET)) {
    foreach ($_GET as $key => $val) {
        $u = mysqli_real_escape_string($conn, $key);
        $new_url = str_replace('/', '', $u);
    }
    
    // Query the database for the full URL associated with the shortened URL
    $sql = mysqli_query($conn, "SELECT full_url FROM url WHERE shorten_url = '{$new_url}'");
    if (mysqli_num_rows($sql) > 0) {
        // Increment the click count for the shortened URL
        $sql2 = mysqli_query($conn, "UPDATE url SET clicks = clicks + 1 WHERE shorten_url = '{$new_url}'");
        if ($sql2) {
            // Fetch the full URL and redirect to it
            $full_url = mysqli_fetch_assoc($sql);
            header("Location:" . $full_url['full_url']);
            exit(); // Stop further script execution after redirection
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Xeorl - Link Shortener and Management Tool</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Xeorl is an All-in-One, Fully Free to Use advanced Link Shortener and Management Tool | Equipped with multi-layered URL encryption, URL metadata remover, Mass shrinker, Quick link and many more! | Powered by xeorgs...">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<?php
include "assets/_header.php";
?>
<body>
    <main>
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
                            echo '<div class="link-icon"><img src="assets/images/url.png" class="logo-img"></div>';
                            echo '<div class="link-info">';
                            echo '<span class="short-link">' . $short_url . '</span>';
                            echo '<span class="long-link">' . $row['full_url'] . '</span>';
                            echo '</div>';
                            echo '<button class="copy-btn"><img src="assets/images/copy.png"></button>';
                            echo '<button class="delete-btn"><img src="assets/images/delete.png"></button>';
                            echo '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </section>
    </main>
    <?php include 'assets/_footer.php'; ?>
    <script src="assets/js/home.js"></script>
    <script src="assets/js/developer_tools.js"></script>
</body>
</html>
