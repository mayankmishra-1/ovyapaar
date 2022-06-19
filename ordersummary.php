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
  <title>Complete your purchase</title>
</head>

<body>
  <header>
    <?php require_once "./header.php"; ?>
  </header>


  <div class="container">
    <div class="hero">
      <!--<img src="https://www.digitshack.com/codepen/mentor1/illustration-hero.svg" alt="">-->
      <img src="ambikaart.jpg" alt="">
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
            <img src="https://www.digitshack.com/codepen/mentor1/icon-music.svg" alt="">
            <div>
              <h5><?= $product[0]['p_name']; ?></h5>
              <p>rs. <?= $item['price']; ?></p>
            </div>
          </div>
          <a href="#">Edit</a>
        </div>
      <?php
        $total += $item['price'];
      }
      ?>
      <p><?= $total;?></p>
      <a href="./payment.php" class="proceed-btn">Proceed to Payment</a>
      <a href="#" class="cancel-btn">Cancel Order</a>
    </div>
  </div>
  <!-- for youtube -->
  <!--<a href="https://youtu.be/rCBYZ7xn-us" target="_blank" class="link">Watch on youtube <i class="fab fa-youtube"></i></a>-->
</body>

</html>