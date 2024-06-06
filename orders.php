<?php
include_once "connection.php";
session_start();

if(isset($_GET['action']) && $_GET['action'] == "delete") {
    $productId = $_GET['id'];
    $deleteQuery = "DELETE FROM orders WHERE id = '$productId'";
    mysqli_query($data, $deleteQuery);
}

?>

<!DOCTYPE html>
<html>
<head>
    <nav>
    <a href="adminhome.php"><span>Go Back</span></a>
    </nav>
</head>
<body>
<table>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove Item</th>
                </tr>
                <?php
                $result = mysqli_query($data, "SELECT * FROM orders;");
                $total = 0;
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_array($result)) { 
                        ?>
                        <tr>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['quantity'];?></td>
                            <td><?php echo $row['total'];?></td>
                            <td><a href="orders.php?action=delete&id=<?php echo $row['id'];?>"><span>Remove Item</span></a></td>
                            
                            <?php
                        
                    }
                }
                ?>
                </tr> 
                <tr></tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
</body>
</html>