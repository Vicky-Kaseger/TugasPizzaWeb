<!-- Ini untuk Tampilan Pertama website -->

<?php

include_once 'connection.php';
session_start();


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

    <center>
        <div class="login-container">
            <div class="login-card">
            <div class="logo">
                <img src="./Assets/pizzalogo.png" alt="Pizza Rhapsody Logo">
            </div>
        <form action = "#" method = "POST">
        <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit">Log In</button>
</div>
<div class="popular-deals">
            <div class="deal-item">
                <img src="./Assets/populardeals.png" alt="Popular Deals">
            </div>
        </div>


</form>
<?php
    
    echo "pass:" . mysqli_fetch_assoc(mysqli_query($data, "SELECT password FROM login;"))['password'];
    
?>

</center>

</body>
</html>
