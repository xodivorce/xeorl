<?php
// Load Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php'; // Correct path for vendor directory in core

// Initialize dotenv and load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../'); // Adjusted to point to htdocs/.env
$dotenv->load();

// Database configuration
$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db = $_ENV['DB_NAME'];

// Establish database connection
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Database connection error: " . mysqli_connect_error());
}
?>
