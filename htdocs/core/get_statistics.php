<?php
// core/get_statistics.php

require 'config.php';  // Assuming config.php contains your database connection setup

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

// Calculate active users (assuming there's a 'user_sessions' table or similar)
$sql_active_users = "SELECT COUNT(DISTINCT user_id) as active_users FROM user_sessions WHERE last_active > DATE_SUB(NOW(), INTERVAL 30 DAY)";
$result_active_users = mysqli_query($conn, $sql_active_users);
if ($result_active_users) {
    $active_users_row = mysqli_fetch_assoc($result_active_users);
    $active_users = $active_users_row['active_users'];
} else {
    //echo "Error fetching active users: " . mysqli_error($conn);
}

?>
