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
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<header>
        <div class="logo"><img src="./Assets/pizzalogo.png" alt="Pizza Logo"></div>
        <nav>

            <ul>
                <li><a href="adminhome.php">Go Back</a></li>
            </ul>
        </nav>
    </header>
    <div class="adding-menu">

<form action="editMenu.php" method="POST">
            <div class="form-group">
            <label for="nameP">Pizza Name</label>
            <input type="number" name="idP" value="<?php echo $rData['idMenu'] ?>" readonly>
            </div>
            <div class="form-group">
            <label for="nameP">Pizza Name</label>
            <input type="text" name="nameP" value="<?php echo $rData['nameMenu'] ?>" $placeholder="Pizza Name">
            </div>
            <div class="form-group">
            <label for="descP">Description</label>
            <input type="text" name="descP" value="<?php echo $rData['descMenu'] ?>" placeholder="Description">
            </div>
            <div class="form-group">
            <label for="priceP">Price</label>
            <input type="text" name="priceP" value="<?php echo $rData['price'] ?>" placeholder="Price"> 
            </div>
            <div class="form-group">
            <label for="imageP">Image</label>
            <input type="file" name="imageP" value="<?php echo $rData['image'] ?>" placeholder="Insert an Image here">
            </div>
            <div class="form-group">
            <label for="statusP">Status</label>
                    <select name="statusP" required>
                        <option value="available">available</option>
                        <option value="unavailable">unavailable</option>
                    </select>
            </div>        
            <button type="submit" name="submit">Edit Pizza</button>
</form>
</div>
</body>
</html>

