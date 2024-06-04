<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "db_web";



$data = mysqli_connect($host, $user, $password, $db);
if($data===false) {
    die("connection error");
}

?>