<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "./db.php";
require_once "./product-controller.php";
require_once "./cart-controller.php";

if (!isset($_SESSION['mail'])) {
    header("Location:homepagenew.php");
}

if (isset($_POST['delete'])) {
    delete_from_cart($_POST['cart_id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="homepagenew.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="cart.css">
</head>
<style>
    h1 {
        text-align: center;
    }
    body{
    background-image: url(https://www.digitshack.com/codepen/mentor1/pattern-background-desktop.svg);
  }
</style>

<body>
    <div class="sidenav">
        <a href="homepagenew.php">Home</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
    </div>
    <?php require_once "./header.php"; ?><br><br><br><br><br>
    <h1>Cart</h1>
    <?php
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT * FROM cart WHERE cust_id=" . $_SESSION['cust_id'];
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <div class="carttable">
        <form action="" method="post">
            <table>
                <tr>
                    <th>Sl#</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                <?php
                $i = 0;
                $total = 0;
                while ($row = $result->fetch_assoc()) {
                    $i++;
                    $total += $row['price'];
                ?>
                    <input type="hidden" name="cart_id" id="" value="<?= $row['cart_id'] ?>">
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['product_id'] ?></td>
                        <td><?= get_product_name($row['product_id']) ?></td>
                        <td>1</td>
                        <td><?= $row['price'] ?></td>
                        <td><button name="delete">Delete</button></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            
            <p>Cart Total: <?= $total?></p>
            <button type="button" onclick="window.location.href='address.php'">Checkout</button>
        </form>
        </div>
    <?php
    } else {
        echo "Cart empty";
    }

    ?>
</body>

</html>