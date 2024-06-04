<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1> This is User homepage> </h1>
    <h2> This session belongs to : </h2> <?php echo $_SESSION["username"]?>

    <a href="logout.php"> LOGOUT </a>
</body>
</html>
