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
    <h1> This is Admin homepage </h1>
    <?php echo $_SESSION["username"]?>

    <h2> This session belongs to : </h2> <a href="logout.php"> LOGOUT </a>
</body>
</html>
