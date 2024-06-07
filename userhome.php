<?php
include_once 'connection.php';
session_start();
if(!isset($_SESSION["username"])) {
    header("location:login.php");
}

if(isset($_POST["add"])) {
    $cartId = $_GET['id'];
    $cartName = $_POST['hidden_name'];
    $cartImage = $_POST['hidden_image'];
    $cartPrice = $_POST['hidden_price'];
    $cartQuantity = $_POST['quantity'];
    $cartTotal = $cartPrice * $cartQuantity;

    mysqli_query($data, "INSERT INTO cart (`name`, `image`, `price`, `quantity`, `total`) VALUES ('$cartName', '$cartImage', '$cartPrice', '$cartQuantity', '$cartTotal');");

}

// echo implode("", mysqli_fetch_assoc(mysqli_query($data, "SELECT descMenu FROM menu WHERE idMenu = 1")));
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="userpage">
    <header>
    <div class="logo"><img src="./Assets/pizzalogo.png" alt="Pizza Logo"></div>
    <nav>
    <ul>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="logout.php"> LOGOUT </a></li>
    </ul>
</nav>
</header>
<section class="welcome-banner">
        <div class="welcome-text">
            <h1>Welcome, <?php echo $_SESSION["username"]?>!</h1> 
            <p>How can we satisfy your cravings today?</p>
        </div>
    </section>
    
 <main>
    <div class="menu-container">
    <?php
$result = mysqli_query($data, "SELECT * FROM menu;");
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div>
            <form action="userhome.php?action=add&id=<?php echo $row['idMenu']; ?>" method="post">
            <div class="menu-item">
                <br>
                <div class="details">
                <img src="./Assets/<?php echo $row['image'];?>" alt="Pizza Image">
                <h3><?php echo $row['nameMenu']?></h3>
                <p><?php echo $row['descMenu']?></p>
                <p class="price">Rp. <?php echo $row['price']?></p>
                <h4><?php echo $row['status']?></h4>
                <input type="text" id="quantity" name="quantity" value="1">
                <input type="hidden" name="hidden_name" value="<?php echo $row['nameMenu'];?>">
                <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
                <input type="submit" class="add-to-cart" name="add" value="Add to Cart">
                </div>
            </form>
        </div>
        <?php
    }
} else {
    echo "No rows found";
}

    ?>


    <br>
    

</body>
</html>
