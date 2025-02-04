<?php
// core/get_statistics.php

require 'config.php';  // Assuming config.php contains your database connection setup
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize variables in case the queries fail
$total_links = 0;
$total_clicks = 0;
$active_users = 0;

// Calculate total links
$sql_total_links = "SELECT COUNT(*) as total_links FROM url";
$result_total_links = mysqli_query($conn, $sql_total_links);
if ($result_total_links) {
    $total_links_row = mysqli_fetch_assoc($result_total_links);
    $total_links = $total_links_row['total_links'];
} else {
    echo "Error fetching total links: " . mysqli_error($conn);
}

// Calculate total clicks
$sql_total_clicks = "SELECT SUM(clicks) as total_clicks FROM url";
$result_total_clicks = mysqli_query($conn, $sql_total_clicks);
if ($result_total_clicks) {
    $total_clicks_row = mysqli_fetch_assoc($result_total_clicks);
    $total_clicks = $total_clicks_row['total_clicks'];
} else {
    echo "Error fetching total clicks: " . mysqli_error($conn);
}

// Calculate active users
$sql_total_users = "SELECT COUNT(*) as total_users FROM user";
$result_total_users = mysqli_query($conn, $sql_total_users);
if ($result_total_users) {
    $total_users_row = mysqli_fetch_assoc($result_total_users);
    $total_users = $total_users_row['total_users'];
} else {
    echo "Error fetching total users: " . mysqli_error($conn);
}


?>
