<!-- Ini untuk Tampilan Pertama website -->

<?php

include_once 'connection.php';


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
    <body>
    
        <div class="loginpage">
    

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
</div>

    
</div>
<div class="groupintro">
<h1>Anggota-anggota kelompok:</h1>

<div class="group-container">
        <div class="groupmate">
            <img src="Assets/FotoStefanuKaseger.jpeg" alt="Foto Stefanus">
            <h3>Stefanus Victory Vicky Kaseger</h3>
            <p>220211060203</p>
        </div>
        <div class="groupmate">
            <img src="Assets/FotoDavidHaniko.jpeg" alt="Foto David">
            <h3>David Evan Efraim Haniko</h3>
            <p>220211060212</p>
        </div>
        <div class="groupmate">
            <img src="Assets/FotoJenniferLaluyan.JPG" alt="Foto Jennifer">
            <h3>Jennifer Elisabeth Laluyan</h3>
            <p>220211060162</p>
        </div>
        <div class="groupmate">
            <img src="Assets/FotoGillardinoMananeke (2).jpeg" alt="Foto Gillardino">
            <h3>Gillardino Mananeke</h3>
            <p>220211060156</p>
        </div>
    </div>
</div>


</form>


</center>

</body>
</html>
