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
    <body>

    <center>
        <h1>Halaman Utama</h1>

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
<?php
    
    echo mysqli_fetch_assoc(mysqli_query($data, "SELECT password FROM login;"))['password'];
    
?>

</center>

</body>
</html>
