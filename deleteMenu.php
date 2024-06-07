<!-- Ini untuk Fungsi delete. -->

<?php
    include_once "connection.php";
    $id = $_GET['idMenu'];
    $dData = mysqli_query($data, "DELETE FROM menu WHERE idMenu = '$id';");

    header("location:adminhome.php?deleteMenu=success");
?>