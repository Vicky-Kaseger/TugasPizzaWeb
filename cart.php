<?php
include_once "connection.php";
session_start();

if(isset($_GET['action']) && $_GET['action'] == "delete") {
    $productId = $_GET['id'];
    $deleteQuery = "DELETE FROM cart WHERE id = '$productId'";
    mysqli_query($data, $deleteQuery);
}

?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
        <div class="logo"><img src="./Assets/pizzalogo.png" alt="Pizza Logo"></div>
        <nav>

            <ul>
                <li><a href="userhome.php">Go Back</a></li>
            </ul>
        </nav>
    </header>
    <div class="welcome-banner">
        <div class="welcome-text">
            <h1>Your Cart</h1>
        </div>
    </div>
        <div>
            <table class="content-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove Item</th>
                </tr>
                </head>
                <tbody>
                <?php
                $result = mysqli_query($data, "SELECT * FROM cart;");
                $total = 0;
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)) { 
                        ?>
                        
                        <tr>
                            <td><?php echo $row['name'];?></td>
                            <td><img class = "imagesrc" src="./Assets/<?php echo $row['image'];?>" alt="Pizza Image"></td>
                            <td><?php echo $row['price'];?></td>
                            <td><?php echo $row['quantity'];?></td>
                            <td><?php echo $row['total'];?></td>
                            <td><a href="cart.php?action=delete&id=<?php echo $row['id'];?>"><span>Remove Item</span></a></td>
                            <?php
                            $total = $total + ($row['quantity']*$row['price']);
                            
                        
                    }
                }
                ?>
                </tr> 
                </body>
                <tr></tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td><?php echo number_format($total, 2);?></td>
                    <td>
                                <br>
                                <form action="addOrder.php" method="POST">
                                <input type="hidden" name="totalO" value="<?php echo number_format($total, 2);?>">
                                <button type="submit" name="submit">Buy Now</button>
                                </form>
                        
                    </td>
                </tr>




    </body>
</html>

            