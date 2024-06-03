<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "db_web";

$data = mysqli_connect($host, $user, $password, $db);
if($data===false) {
    die("connection erode");
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
