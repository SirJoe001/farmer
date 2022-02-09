<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "agric";

$conn = mysqli_connect($server, $user, $password, $dbname);

if (!$conn) {
    die("you are not connected");
} 

?>