<?php
include "config.php";

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
