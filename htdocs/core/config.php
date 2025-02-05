<?php

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$db = $_ENV['DB_NAME'];

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Database connection error: " . mysqli_connect_error());
}
?>
