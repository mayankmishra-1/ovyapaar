<?php
require_once './order-common.php';
require_once './product-common.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="ordersummary.css">
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
  <header>
    <?php require_once "./header.php"; ?>
  </header>


  <div class="container">
    <div class="hero">
      <!--<img src="https://www.digitshack.com/codepen/mentor1/illustration-hero.svg" alt="">-->
      <img src="ambikaart.jpg" alt="" height="150" width="400">
    </div>
    <div class="text-content">
      <h2 class="title">
        Order Summary
      </h2>
      <p class="subtitle">
        Your order items:
      </p>
      <?php
      $cust_id = $_SESSION['cust_id'];
      $cart = fetch_cart($cust_id);
      $total = 0;
      foreach ($cart as $item) {
        $product = fetch_product($item['product_id']);
      ?>
        <div class="plan-box">
          <div class="plan-box-left">
            <!-- <img src="https://www.digitshack.com/codepen/mentor1/icon-music.svg" alt=""> -->
            <div>
              <h5><?= $product[0]['p_name']; ?></h5>
              <p>rs. <?= $item['price']; ?></p>
            </div>
          </div>
          <!-- <a href="#">Edit</a> -->
        </div>
      <?php
        $total += $item['price'];
      }
      ?>
      <p>Total price: Rs.<?= $total;?></p>
      <a href="./payment.php" class="proceed-btn">Proceed to Payment</a>
      <a href="homepagenew.php" class="cancel-btn">Cancel Order</a>
    </div>
  </div>
  <!-- for youtube -->
  <!--<a href="https://youtu.be/rCBYZ7xn-us" target="_blank" class="link">Watch on youtube <i class="fab fa-youtube"></i></a>-->
</body>

</html>