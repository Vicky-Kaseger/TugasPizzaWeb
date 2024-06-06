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
    <title></title>
</head>
<body>
    <nav>
        <a href="cart.php">Cart</a>
    <h1> This is User homepage </h1>
    <h2> This session belongs to : </h2> <?php echo $_SESSION["username"]?>

    <a href="logout.php"> LOGOUT </a>
 
    <br>
    <h3> Menu: </h3>

 <!-- Ini untuk memperlihatkan Menu   -->
    <?php
$result = mysqli_query($data, "SELECT * FROM menu;");
if(mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="product">
            <form action="userhome.php?action=add&id=<?php echo $row['idMenu']; ?>" method="post">
            <div class='product'>
                <br>
                <img src="<?php echo $row['image'];?>" alt="Pizza Image">
                <h4>Name: <?php echo $row['nameMenu']?></h4>
                <h4>Desc: <?php echo $row['descMenu']?></h4>
                <h4>Price: <?php echo $row['price']?></h4>
                <h4>Status: <?php echo $row['status']?></h4>
                <input type="text" id="quantity" name="quantity" value="1">
                <input type="hidden" name="hidden_name" value="<?php echo $row['nameMenu'];?>">
                <input type="hidden" name="hidden_image" value="<?php echo $row['image'];?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row['price'];?>">
                <input type="submit" name="add" value="Add to Cart">
            </div>
            </form>
        </div>
        <!-- echo 
        "Name: " . $row['nameMenu'] . "<br>" .
        "Description: " . $row['descMenu'] . "<br>" .
        "Price: " . $row['price'] . "<br>" .
        "Status: " . $row['status'] . "<br>" . 
        array_push($cart, mysqli_fetch_assoc(mysqli_query($data, "SELECT idMenu FROM menu WHERE idMenu = '{$row['idMenu']}'"))['idMenu']) .
        "<br> <br>"; -->
        <?php
    }
} else {
    echo "No rows found";
}

    ?>

</body>
</html>
