<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "db_web";

$data = mysqli_connect($host, $user, $password, $db);
if($data===false) {
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE user_name = '".$username."' AND password = '".$password."' ";

    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);

    if($row["userType"] == "user") {
        echo "user";
    }

    elseif($row["userType"] == "admin") {
        echo "admin";
    }

    else {
        echo "Username or Password Incorrect";
    }
}


?>




<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

    <center>
        <h1>Testing</h1>

        <form action = "#" method = "POST">
<div>
            <label>username</label>
            <input type = "text" name = "username" required>
</div>

<div>
            <label>password</label>
            <input type = "password" name = "password" required>
</div>

<div>
            <input type = "submit" value = "Login">
</div>

</form>

</center>

</body>
</html>
