<?php
include_once 'connection.php';

session_start();

if(!isset($_SESSION["username"])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="adminhome">
    <header>
    <div class="logo"><img src="./Assets/pizzalogo.png" alt="Pizza Logo"></div>
        <nav>
            <ul>
                <li><a href="orders.php">Orders</a></li>
                <li><a href="logout.php"> LOGOUT </a></li>
            </ul>
        </nav>
    </header>

    <div class="welcome-banner">
        <div class="welcome-text">
            <h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
        </div>
    </div>

    <div class="adding-menu">

    <form action="addMenu.php" method="POST">
                <div class="form-group">
                    <label for="nameP">Pizza Name</label>
                    <input type="text" name="nameP" placeholder="Pizza Name" required>
                </div>
                <div class="form-group">
                    <label for="descP">Description</label>
                    <input type="text" name="descP" placeholder="A short desc of the pizza" required>
                </div>
                <div class="form-group">
                    <label for="priceP">Price</label>
                    <input type="text" name="priceP" placeholder="Price" required>
                </div>
                <div class="form-group">
                    <label for="imageP">Insert Image</label>
                    <input type="file" name="imageP" required>
                </div>
                <div class="form-group">
                    <label for="statusP">Status</label>
                    <select name="statusP" required>
                        <option value="available">available</option>
                        <option value="unavailable">unavailable</option>
                    </select>
                </div>        
                <button type="submit" name="submit">Tambah Pizza</button>
</form>
</div>

<div class="menu-container">
    <?php
$result = mysqli_query($data, "SELECT * FROM menu;");
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        
            <form action="userhome.php?action=add&id=<?php echo $row['idMenu']; ?>" method="post">
            <div class="menu-item">
                <br>
                <div class="details">
                <img src="./Assets/<?php echo $row['image'];?>" alt="Pizza Image">
                <h3><?php echo $row['nameMenu']?></h3>
                <p><?php echo $row['descMenu']?></p>
                <p class="price">Rp. <?php echo $row['price']?></p>
                <h4><?php echo $row['status']?></h4>
                <input type="hidden" name="hidden_name" value="<?php echo $row['nameMenu'];?>">
                <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
                <a href="editData.php?idMenu=<?php echo $row['idMenu']?>">Edit</a>
                <a> | </a>
                <a href="deleteMenu.php?idMenu=<?php echo $row['idMenu']?>">Delete</a>
                
                </div>
            </form>
        </div>
        <?php
    }
} else {
    echo "No rows found";
}

    ?>
    </div>

   
</body>
</html>
