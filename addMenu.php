<!-- Ini untuk Fungsi menambah. -->

<?php

include_once 'connection.php';

$nameP = $_POST['nameP'];
$descP = $_POST['descP'];
$priceP = $_POST['priceP'];
$imageP = $_POST['imageP'];
$statusP = $_POST['statusP'];


$sql = "INSERT INTO menu (nameMenu, descMenu, price, image, status)
        VALUES ('$nameP', '$descP', '$priceP', '$imageP', '$statusP');";
        
mysqli_query($data, $sql);



header("location:adminhome.php?addMenu=success");
