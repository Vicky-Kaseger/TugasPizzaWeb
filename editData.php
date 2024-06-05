<?php
include_once "connection.php";
$id = $_GET['idMenu'];
$getData = mysqli_query($data, "SELECT * FROM Menu WHERE idMenu = $id;");
$rData = mysqli_fetch_array($getData);

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<a href="adminhome.php"> BACK </a>
<form action="editMenu.php" method="POST">
        <br>
        <br>
        <input type="number" name="idP" value="<?php echo $rData['idMenu'] ?>" readonly>
        <br>
        <input type="text" name="nameP" value="<?php echo $rData['nameMenu'] ?>" $placeholder="Pizza Name"> 
        <br>
        <input type="text" name="descP" value="<?php echo $rData['descMenu'] ?>" placeholder="Description"> 
        <br>
        <input type="text" name="priceP" value="<?php echo $rData['price'] ?>" placeholder="Price"> 
        <br>
        <input type="text" name="imageP" value="<?php echo $rData['image'] ?>" placeholder="Insert an Image here"> 
        <br>
        <input type="text" name="statusP" value="<?php echo $rData['status'] ?>" placeholder="Status">
        <br>
        <button type="submit" name="submit">Edit Pizza</button>
    </form>




</body>
</html>

