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
    </head>
    <body>
        <nav>
        <h3>Cart</h3>
        <a href="userhome.php"><span>Go Back</span></a>
        </nav>
        <div>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove Item</th>
                </tr>
                <?php
                $result = mysqli_query($data, "SELECT * FROM cart;");
                $total = 0;
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)) { 
                        ?>
                        <tr>
                            <td><?php echo $row['name'];?></td>
                            <td><img src="img/<?php echo $row['image'];?>" alt="Pizza Image"></td>
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
                <tr></tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td><?php echo number_format($total, 2);?></td>
                    <td>
                        
                                
                                <br>

                                <?php
                            
                        
                        ?>

                                <form action="addOrder.php" method="POST">
                                <input type="hidden" name="totalO" value="<?php echo number_format($total, 2);?>">
                                <button type="submit" name="submit">Buy Now</button>
                                </form>
                        
                    </td>
                </tr>




    </body>
</html>

            