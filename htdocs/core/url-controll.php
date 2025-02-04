<?php
session_start();
include "config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
$full_url = mysqli_real_escape_string($conn, $_POST['full_url']);

if (!empty($full_url) && filter_var($full_url, FILTER_VALIDATE_URL)) {
    $ran_url = substr(md5(microtime()), rand(0, 26), 5);
    $sql = mysqli_query($conn, "SELECT * FROM url WHERE shorten_url = '{$ran_url}'");

    if (mysqli_num_rows($sql) > 0) {
        echo "Something went wrong. Please generate again!";
    } else {
        $sql2 = mysqli_query($conn, "INSERT INTO url (full_url, shorten_url, clicks) 
                                     VALUES ('{$full_url}', '{$ran_url}', '0')");
        if ($sql2) {
            $link_id = mysqli_insert_id($conn); // Get the ID of the newly inserted row
            if (!isset($_SESSION['shortened_links'])) {
                $_SESSION['shortened_links'] = array();
            }
            $_SESSION['shortened_links'][] = $link_id; // Store the link ID in session

            $shorten_url = $ran_url;
            echo $shorten_url;
        }
    }
} else {
    echo "$full_url - This is not a valid URL!";
}
?>
