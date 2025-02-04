<?php
require 'core/vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'home.php';
?>