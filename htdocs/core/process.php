<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the configuration file
include "core/config.php";

// Start session management
session_start();

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
            // Fetch the full URL and store it in the session
            $full_url = mysqli_fetch_assoc($sql);
            $_SESSION['redirect_url'] = $full_url['full_url'];
            
            // Redirect to unzipper.php
            header("Location: unzipper.php");
            exit(); // Stop further script execution after redirection
        }
    }
}
?>
