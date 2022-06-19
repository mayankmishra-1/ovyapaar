<?php
require_once "./order-common.php";
require_once "./product-common.php";
session_start();
$order_id = $_SESSION['order_id'];
echo $order_id;
$order = fetch_order($order_id);
$order_details = fetch_order_details($order_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="orderconfirmation.css">
  <title>Complete your purchase</title>
</head>

<body>
  <div class="container">
    <div class="hero">
      <!--<img src="https://www.digitshack.com/codepen/mentor1/illustration-hero.svg" alt="">-->
      <img src="ambikaart.jpg" alt="">
    </div>
    <div class="text-content">
      <h2 class="title">
        Order Confirmation
      </h2>
      <p class="subtitle">
        Here are the order details:
        Order No: <?= $order[0]['o_id']; ?>
      </p>
      <?php
      foreach ($order_details as $order_item) {
      ?>
        <div class="plan-box">
          <div class="plan-box-left">
            <!-- <img src="https://www.digitshack.com/codepen/mentor1/icon-music.svg" alt=""> -->
            <div>
              <?php
              $product = fetch_product($order_item['product_id']);
              ?>
              <h5><?= $product[0]['p_name'] ;?></h5>
              <p>Qty.<?= $order_item['quantity'];?></p>
            </div>
          </div>
          Rs. <?= $order_item['rate'];?>
        </div>
      <?php
      }
      ?>
      <a href="#" class="proceed-btn">Proceed</a>
      <a href="#" class="cancel-btn">Cancel Order</a>
    </div>
  </div>
  <!-- for youtube -->
  <!--<a href="https://youtu.be/rCBYZ7xn-us" target="_blank" class="link">Watch on youtube <i class="fab fa-youtube"></i></a>-->
</body>

</html>