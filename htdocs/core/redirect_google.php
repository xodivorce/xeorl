<?php
session_start();
// Load Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php'; // Correct path for vendor directory in core
require_once 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Google OAuth Configuration
$clientID = '1087400250877-qmns5ehmke31cd19p2cfm8111oovlnf8.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/Php-Projects/xeorl/htdocs/core/redirect_google.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $google_id = $google_account_info->id;
    $name = $google_account_info->name;
    $email = $google_account_info->email;

    // Check if user exists in database
    $stmt = $conn->prepare("SELECT id, user_name, user_email, user_type FROM user WHERE google_id = ? OR user_email = ?");
    $stmt->bind_param("ss", $google_id, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Insert new user
        $default_user_type = 3; // Default user type
        $stmt = $conn->prepare("INSERT INTO user (google_id, user_email, user_name, user_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $google_id, $email, $name, $default_user_type);
        $stmt->execute();
        $user_id = $stmt->insert_id;
    } else {
        // User exists, fetch user ID
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $name = $row['user_name'];
        $email = $row['user_email'];
    }

    // Store user session
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;

    // Redirect to dashboard
    header("Location: ../dashboard.php");
    exit();
} else {
    header("Location: " . $client->createAuthUrl());
    exit();
}
?>
