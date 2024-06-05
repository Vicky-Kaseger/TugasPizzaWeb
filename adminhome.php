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
    
    <h2> This session belongs to : </h2> 
    <?php echo $_SESSION["username"]?>
    <a href="logout.php"> LOGOUT </a>

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

    <?php

$result = mysqli_query($data, "SELECT * FROM menu;");
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo 
        "Name: " . $row['nameMenu'] . "<br>" .
        "Description: " . $row['descMenu'] . "<br>" .
        "Price: " . $row['price'] . "<br>" .
        "Status: " . $row['status'] . "<br>" .
        "<a href='editData.php?idMenu=" . $row['idMenu'] . "'>Edit</a>" . 
        " | " .
        "<a href='deleteMenu.php?idMenu=" . $row['idMenu'] . "'>Delete</a>" .
        "<br> <br>";
    }
} else {
    echo "No rows found";
}
?>
</body>
</html>
