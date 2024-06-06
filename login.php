<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "db_web";

session_start();

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE user_name = '".$username."' AND password = '".$password."' ";

    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);

    if ($row["userType"] == "user") {
        $_SESSION["username"] = $username;
        header("location:userhome.php");
    } elseif ($row["userType"] == "admin") {
        $_SESSION["username"] = $username;
        header("location:adminhome.php");
    } else {
        echo "Username or Password Incorrect";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Rhapsody - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="loginpage">
    <div class="login-container">
        <div class="login-card">
            <div class="logo">
                <img src="./Assets/pizzalogo.png" alt="Pizza Rhapsody Logo">
            </div>
            <form action="#" method="POST">
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit">Log In</button>
            </form>
        </div>
        <div class="popular-deals">
            <div class="deal-item">
                <img src="./Assets/populardeals.png" alt="Popular Deals">
            </div>
        </div>
    </div>
</body>
</html>
