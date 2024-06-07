<!-- Ini untuk Fungsi menambah order. -->

<?php

include_once 'connection.php';


$sql = "INSERT INTO orders (name, quantity, total) SELECT name, quantity, total FROM cart;";
$anothersql = "DELETE FROM cart;";


mysqli_query($data, $sql);
mysqli_query($data, $anothersql);

header("location:cart.php?addOrder=success");
