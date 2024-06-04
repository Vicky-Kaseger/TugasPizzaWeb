<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "db_web";

session_start();


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


    // Ini bagian yang mendeteksi user atau admin. Kalo user, mo pergi ke userhome.php. Kalo admin, mo ke adminhome.php.
    if($row["userType"] == "user") {
        $_SESSION["username"] = $username;
        header("location:userhome.php");
    }

    elseif($row["userType"] == "admin") {
        $_SESSION["username"] = $username;
        header("location:adminhome.php");
    }

    else {
        echo "Username or Password Incorrect";
    }
}


?>

<!-- Kalo mo edit tampilan, isi di bagian HTML yang di bawah. Yang ada "<!DOCTYPE html>". -->

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body class="loginpage">
    <div class="container">
        <div class="populardeals">
            <div class="populardeals-item">
                <img src="./Assets/pizza1.jpg" alt="pizza1">
                <h2>Neapolitan Pizza</h2>
            </div>
            <div class="populardeals-item">
                <img src="./Assets/pizza2.jpg" alt="pizza2">
                <h2>All-Day Lasagna</h2>
            </div>
            <div class="populardeals-item">
                <img src="./Assets/pizza3.jpg" alt="pizza3">
                <h2>Another Pizza</h2>
            </div>
            <div class="populardeals-item">
                <img src="./Assets/pizza3.jpg" alt="pizza4">
                <h2>Pizza Margherita</h2>
            </div>
            <div class="populardeals-item">
                <img src="./Assets/pizza5.jpg" alt="pizza5">
                <h2>Pepperoni Pizza</h2>
            </div>
        </div>
        <div class="login">
            <h1>LET’S GET YOU INTO PIZZA RHAPSODY!</h1>
            
            <form action = "#" method = "POST">
                <input type="text" placeholder="Username" name="username">
                <input type="password" placeholder="Password" name="password">
                <button type="submit">LOG IN</button>
            </form>
        </div>
    </div>

</body>
</html>
