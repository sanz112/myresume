<?php
$hostname = "localhost";
$username = "root";
$password = "WittTech1.";
$dbname = "samuel";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn) {
    "Connection Error:".mysqli_connect_error();
    die();
}