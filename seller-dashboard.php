<?php
require_once "./order-common.php";
$sid=1;      //to be replace with sid from session
$active_orders = fetch_active_orders($sid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <!-- <link rel="stylesheet" href="./homepagenew.css"> -->
    <!-- <link rel="stylesheet" href="app.css"> -->
    <style>
        .container {
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
    </style>
</head>

<body>
    <header>
        <?php //require_once "./seller-header.php"; 
        ?>
    </header>
    <main>
        <div class="container">
            <!-- Active Orders -->
            <div class="card-container">
                <div class="card-title">
                    Active Orders [<?= count_orders("A", "$sid")?>]
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Order Id</th>
                            <th>Order Date</th>
                            <th>Order Time</th>
                        </tr>
                        <?php foreach($active_orders as $active_order) {?>
                        <tr>
                            <td><a href=""><?= $active_order['o_id']?></a></td>
                            <td><?= $active_order['o_date']?></td>
                            <td><?= $active_order['o_time']?></td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>

            <!-- Fulfilled Orders -->
            <div class="card-container">
                <div class="card-title">
                    Active Orders []
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Order_id</th>
                        </tr>
                        <?php foreach($active_orders as $active_order) {?>
                        <tr>
                            <td><?= $active_order['o_id']?></td>
                        </tr>
                        <?php }?>
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
                        <?php foreach($active_orders as $active_order) {?>
                        <tr>
                            <td><?= $active_order['o_id']?></td>
                        </tr>
                        <?php }?>
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
                        <?php foreach($active_orders as $active_order) {?>
                        <tr>
                            <td><?= $active_order['o_id']?></td>
                        </tr>
                        <?php }?>
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
                        <?php foreach($active_orders as $active_order) {?>
                        <tr>
                            <td><?= $active_order['o_id']?></td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </main>
</body>

</html>