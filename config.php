<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "reels";

$con = mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    die("Connection Failed : " . mysqli_connect_error());
}
