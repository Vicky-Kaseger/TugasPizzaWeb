<?php
include_once 'connection.php';
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

    <form action="addMenu.php" method="POST">
        <input type="text" name="nameP" placeholder="Pizza Name"> 
        <br>
        <input type="text" name="descP" placeholder="Description"> 
        <br>
        <input type="text" name="priceP" placeholder="Price"> 
        <br>
        <input type="text" name="imageP" placeholder="Insert an Image here"> 
        <br>
        <input type="text" name="statusP" placeholder="Status">
        <br>
        <button type="submit" name="submit">Add Pizza</button>
    </form>

</body>
</html>
