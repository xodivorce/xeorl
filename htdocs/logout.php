<?php
session_start();
session_destroy();
header("Location: index.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
exit();
?>
