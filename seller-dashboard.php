<?php
require_once "./order-common.php";
require_once "./product-common.php";

if (isset($_POST['fulfilled'])) {
    $oid = $_POST['fulfilled'];
    mark_as_fulfilled($oid);
}

if (isset($_POST['delete'])) {
    $oid = $_POST['delete'];
    delete_order($oid);
}

session_start();
$sid = $_SESSION['sid'];
$active_orders = fetch_active_orders($sid);
$fulfilled_orders = fetch_fullfilled_orders($sid);
$cancelled_orders = fetch_cancelled_orders($sid);
$products = fetch_all_products($sid);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepagenew.css">
    <title>Seller Dashboard</title>
    <style>
        header {
            background-color: black;
            top: 0;
            left: 0;
            width: 100%;
            position: fixed;
            color: white;
            height: 70px;

        }

        body {
            /* background-color: darkgray; */
            background-image: url(https://www.digitshack.com/codepen/mentor1/pattern-background-desktop.svg);
        }

        .title {
            margin: 100px;
            text-align: center;
            font-size: large;
        }

        .container {
            margin-top: 20px;
            margin-left: 10px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
        }

        .card-container {}

        .card-title {
            background-color: black;
            color: white;
            padding: 10px;
        }

        .card body {
            overflow-x: auto;
        }

        table,
        th,
        td {
            /* border: 1px solid; */
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: coral;
        }

        tr {
            background-color: #f2f2f2;
        }

        td a {
            color: black;
        }
    </style>
</head>

<body>
    <header>
        <?php require_once "./seller-header.php"; ?>
    </header>
    <main>
        <div class="title">
            <h1>Dashboard</h1>
        </div>
        <div class="container">
            <!-- Active Orders -->
            <div class="card-container">
                <div class="card-title">
                    Active Orders [<?= count_orders("A", "$sid") ?>]
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <table>
                            <tr style="background-color: #B8B6CC;">
                                <th>Order Id</th>
                                <th>Order Date</th>
                                <th>Order Time</th>
                                <th>Actions</th>
                            </tr>
                            <?php
                            if (is_array($active_orders)) {
                                foreach ($active_orders as $active_order) { ?>
                                    <tr>
                                        <td><a href="./seller-a-order.php?oid=<?= $active_order['o_id'] ?>"><?= $active_order['o_id'] ?></a></td>
                                        <td><?= $active_order['o_date'] ?></td>
                                        <td><?= $active_order['o_time'] ?></td>
                                        <td>
                                            <!-- <input type="hidden" name="hidden-oid" value="<?= $active_order['o_id'] ?>"> -->
                                            <button name="fulfilled" value="<?= $active_order['o_id'] ?>">Mark as fulfilled</button>
                                            <button name="delete" value="<?= $active_order['o_id'] ?>">Delete</button>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </table>
                    </form>
                </div>
                <div class="card-footer">

                </div>
            </div>

            <!-- Fulfilled Orders -->
            <div class="card-container">
                <div class="card-title">
                    Fulfilled Orders [<?= count_orders("F", "$sid") ?>]
                </div>
                <div class="card-body">
                    <?php if (is_array($fulfilled_orders)) { ?>
                        <table>
                            <tr style="background-color: #B8B6CC;">
                                <th>Order_id</th>
                                <th>Order Date</th>
                                <th>Order Time</th>                                
                            </tr>
                            <?php
                            foreach ($fulfilled_orders as $fulfilled_order) { ?>
                                <tr>
                                    <td><?= $fulfilled_order['o_id'] ?></td>
                                    <td><?= $active_order['o_date'] ?></td>
                                        <td><?= $active_order['o_time'] ?></td>
                                </tr>
                        <?php }
                        } else {
                            echo "No matching orders found!";
                        } ?>
                        </table>
                </div>
                <div class="card-footer">

                </div>
            </div>

            <div class="card-container">
                <div class="card-title">
                    Cancelled Orders [<?= count_orders("C", "$sid") ?>]
                </div>
                <div class="card-body">
                    <?php if (is_array($cancelled_orders)) { ?>
                        <table>
                            <tr style="background-color: #B8B6CC;">
                                <th>Order_id</th>
                            </tr>
                            <?php
                            foreach ($cancelled_orders as $cancelled_order) { ?>
                                <tr>
                                    <td><?= $cancelled_order['o_id'] ?></td>
                                </tr>
                        <?php }
                        } else {
                            echo "No matching orders found!";
                        } ?>
                        </table>
                </div>
                <div class="card-footer">

                </div>
            </div>

            <div class="card-container">
                <div class="card-title">
                    Products []
                </div>
                <div class="card-body">
                    <?php if (is_array($products)) { ?>
                        <table>
                            <tr style="background-color: #B8B6CC;">
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($products as $product) { ?>
                                <tr>
                                    <td><?= $product['product_id'] ?></td>
                                    <td><?= $product['p_name'] ?></td>
                                    <td><?= $product['p_price'] ?></td>
                                    <td><a href="">Delete</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
                </div>
                <div class="card-footer">

                </div>
            </div>

        </div>
    </main>
</body>

</html>