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
    <nav>
    <a href="orders.php">Orders</a>
</nav>
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

// Ini untuk memperlihatkan Menu
$result = mysqli_query($data, "SELECT * FROM menu;");
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="product">
            <form action="adminhome.php?action=add&id=<?php echo $row['idMenu']; ?>" method="post">
            <div class='product'>
                <br>
                <img src="<?php echo $row['image'];?>" alt="Pizza Image">
                <h4>Name: <?php echo $row['nameMenu']?></h4>
                <h4>Desc: <?php echo $row['descMenu']?></h4>
                <h4>Price: <?php echo $row['price']?></h4>
                <h4>Status: <?php echo $row['status']?></h4>
                <a href="editData.php?idMenu=<?php echo $row['idMenu']?>">Edit</a>
                <a> | </a>
                <a href="deleteMenu.php?idMenu=<?php echo $row['idMenu']?>">Delete</a>
                <br> <br>
        <?php
    }
} else {
    echo "No rows found";
}
?>
</body>
</html>
