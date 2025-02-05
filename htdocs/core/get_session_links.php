<?php
session_start();
include "config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['shortened_links'])) {
    $_SESSION['shortened_links'] = array();
}

$links = array();
foreach ($_SESSION['shortened_links'] as $link_id) {
    $sql = mysqli_query($conn, "SELECT * FROM url WHERE id = '{$link_id}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $links[] = array(
            'short_url' => $row['shorten_url'],
            'full_url' => $row['full_url']
        );
    }
}

echo json_encode($links);
?>
