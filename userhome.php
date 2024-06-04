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
    <h1> This is User homepage </h1>
    <h2> This session belongs to : </h2> <?php echo $_SESSION["username"]?>

    <a href="logout.php"> LOGOUT </a>
 
    <br>
    <h3> Menu: </h3>
    <?php

$result = mysqli_query($data, "SELECT * FROM menu;");
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo 
        "Name: " . $row['nameMenu'] . "<br>" .
        "Description: " . $row['descMenu'] . "<br>" .
        "Price: " . $row['price'] . "<br>" .
        "Status: " . $row['status'] . "<br> <br> <br>";
    }
} else {
    echo "No rows found";
}
   
  
    
    ?>
</body>
</html>
