<?php
require_once "./order-common.php";
require_once "./product-common.php";
$sid = 1;      //to be replace with sid from session
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
            width: 100%;
            position: fixed;
            color: white;
            height: 70px;

        }

        .title {
            margin: 100px;
            text-align: center;
            font-size: large;
        }

        .container {
            margin-top: 20px;
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
                    <table>
                        <tr>
                            <th>Order Id</th>
                            <th>Order Date</th>
                            <th>Order Time</th>
                        </tr>
                        <?php foreach ($active_orders as $active_order) { ?>
                            <tr>
                                <td><a href=""><?= $active_order['o_id'] ?></a></td>
                                <td><?= $active_order['o_date'] ?></td>
                                <td><?= $active_order['o_time'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>

            <!-- Fulfilled Orders -->
            <div class="card-container">
                <div class="card-title">
                    Completed Orders [<?= count_orders("F", "$sid") ?>]
                </div>
                <div class="card-body">
                    <?php if(is_array($fulfilled_orders)) { ?>
                    <table>
                        <tr>
                            <th>Order_id</th>
                        </tr>
                        <?php 
                        foreach ($fulfilled_orders as $fulfilled_order) { ?>
                            <tr>
                                <td><?= $fulfilled_order['o_id'] ?></td>
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
                    Cancled Orders [<?= count_orders("C", "$sid") ?>]
                </div>
                <div class="card-body">
                    <?php if(is_array($cancelled_orders)) { ?>
                    <table>
                        <tr>
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
                    <table>
                        <tr>
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
                                <td><a href="">Delivered</a></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>

            <div class="card-container">
                <div class="card-title">
                    Active Orders []
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Order_id</th>
                        </tr>
                        <?php foreach ($active_orders as $active_order) { ?>
                            <tr>
                                <td><?= $active_order['o_id'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </main>
</body>

</html>