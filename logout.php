<!-- Ini untuk Fungsi logout. -->

<?php
session_start();
session_destroy();
header("location:login.php");
?>