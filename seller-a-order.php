<?php
require_once "./order-common.php";
require_once "./product-common.php";
require_once "./customer-common.php";
require_once "./customer-controller.php";
session_start();
$order_id = $_GET['oid'];
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
  <link rel="stylesheet" href="homepagenew.css">
  <title>Complete your purchase</title>
  <style>
    header {
            background-color: black;
            top: 0;
            width: 100%;
            position: fixed;
            color: white;
            height: 70px;

        }
        .container{
          margin-top: 50px;
        } 
        </style>
</head>

<body>
<header class="site-header">
  <div class="site-identity">
    <a href="homepagenew.php"><img src="ovyapaar.png" alt="O-Vyapaar"></a>
  </div>
  <nav class="site-navigation">
    <ul class="nav">
      <li><input type="text" placeholder="Search.."></li>
      <li><a href="contact.html">Contact</a></li>
      <li><a href="cart.php">Cart <span><?php if(isset($_SESSION['cust_id'])) //{ //echo "[" . cart_count($cust_id) . "]";} ?></span></a></li>
      <li><a id="login_signup"></a></li>
      <?php
      if (isset($_SESSION['mail']))
        echo "<li><a href='logout.php'>Logout</a></li>";
      ?>
    </ul>
  </nav>
</header>
  <div class="container">
    <div class="hero">
      <!--<img src="https://www.digitshack.com/codepen/mentor1/illustration-hero.svg" alt="">-->
      <!-- <img src="ambikaart.jpg" alt=""> -->
    </div>
    <div class="text-content">
      <h2 class="title">
        Order No:<?= $order[0]['o_id']; ?>
      </h2>
      <p class="subtitle">
        Here are the order details:</p>
        <p class="subtitle">Customer name: <?= get_customer_name_by_cid($order[0]['cust_id']);?>
      </p>
      <?php
              $address = fetch_customer_address($order[0]['cust_id']);
              $number = get_customer_details($order[0]['cust_id']);
              ?>
      <p class="subtitle">Customer Address: <?= $address[0]['locality']; ?>,<?= $address[0]['city']; ?>,<?= $address[0]['state']; ?>
      </p>
      <p class="subtitle">Customer Contact:<?= $number['number']; ?>
      </p>
      <?php
      foreach ($order_details as $order_item) {
      ?>
        <div class="plan-box">
          <div class="plan-box-left">
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
      <a href="seller-dashboard.php" class="proceed-btn">Go Back</a>
    </div>
  </div>
  <!-- for youtube -->
  <!--<a href="https://youtu.be/rCBYZ7xn-us" target="_blank" class="link">Watch on youtube <i class="fab fa-youtube"></i></a>-->
</body>

</html>