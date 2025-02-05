<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "core/config.php";

session_start();

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

$new_url = "";

if (isset($_GET)) {
    foreach ($_GET as $key => $val) {
        $u = mysqli_real_escape_string($conn, $key);
        $new_url = str_replace('/', '', $u);
    }

    $sql = mysqli_query($conn, "SELECT full_url FROM url WHERE shorten_url = '{$new_url}'");
    if (mysqli_num_rows($sql) > 0) {
        $sql2 = mysqli_query($conn, "UPDATE url SET clicks = clicks + 1 WHERE shorten_url = '{$new_url}'");
        if ($sql2) {
            $full_url = mysqli_fetch_assoc($sql);
            $_SESSION['redirect_url'] = $full_url['full_url'];
            include 'unzipper.php';
            exit();
        }
    }
}
?>
