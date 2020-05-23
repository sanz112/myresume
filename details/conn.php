<?php
$hostname = "localhost";
$username = "root";
$password = "WittTech1.";
$dbname = "nccf";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if(!$conn) {
    "Connection Error:".mysqli_connect_error();
    die();
}