<?php

include_once 'connection.php';

$idP = $_POST['idP'];
$nameP = $_POST['nameP'];
$descP = $_POST['descP'];
$priceP = $_POST['priceP'];
$imageP = $_POST['imageP'];
$statusP = $_POST['statusP'];



$sql = "UPDATE menu 
        SET nameMenu = '$nameP',
        descMenu = '$descP',
        price = '$priceP',
        image = '$imageP',
        status = '$statusP'
        WHERE idMenu = '$idP'";;

mysqli_query($data, $sql);



header("location:adminhome.php?editMenu=success");

?>