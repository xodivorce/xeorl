<?php
include "config.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "This feature is for members only";
    exit;
}

if(isset($_GET['id'])){
    $delete_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = mysqli_query($conn, "DELETE FROM url WHERE shorten_url = '{$delete_id}'");

    if($sql){
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
