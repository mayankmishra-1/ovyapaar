<?php
require_once "./order-common.php";
require_once "./product-common.php";
session_start();
$cid = $_SESSION['cust_id'];
$orders = fetch_customer_orders($cid);
$order_details = null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="orderconfirmation.css">
  <link rel="stylesheet" href="homepagenew.css">
  <title>Orders</title>
  <style>
    header {
      background-color: black;
      top: 0;
      width: 100%;
      position: fixed;
      color: white;
      height: 70px;

    }

    .container {
      margin-top: 50px;
    }

    @import url('https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@500;700;900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Red Hat Display',
        sans-serif;
      min-height: 100vh;
      background-image: url(https://www.digitshack.com/codepen/mentor1/pattern-background-desktop.svg);
      background-repeat: no-repeat;
      background-size: cover;
      background-color: hsl(225, 100%, 94%);
      position: relative;
      font-size: 16px;
    }

    .container {
      /* position: absolute; */
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      max-width: 450px;
      background: white;
      border-radius: 20px;
      overflow: hidden;
    }

    .text-content {
      padding: 7%;
      text-align: center;
    }

    .title {
      color: hsl(223, 47%, 23%);
      font-weight: 900;
      font-size: 32px;
      margin-bottom: 20px;
    }

    .text-content p.subtitle {
      color: #8a8a8a;
      margin-bottom: 25px;
    }

    .plan-box {
      background-color: hsl(225, 100%, 98%);
      border-radius: 12px;
      display: flex;
      padding: 25px;
      align-items: center;
      justify-content: space-between;
    }

    .plan-box-left {
      display: flex;
      align-items: center;
      text-align: left;
    }

    .plan-box-left div {
      margin-left: 20px;
    }

    .plan-box-left div h5 {
      font-weight: 900;
      font-size: 15px;
      color: hsl(223, 47%, 23%);
    }

    .plan-box-left div p {
      font-size: 14px;
      color: #8a8a8a;
    }

    .plan-box a {
      font-weight: 900;
      color: hsl(223, 47%, 23%);
      transition: color .3s ease;
    }

    .plan-box a:hover {
      text-decoration: none;
      color: hsl(245, 75%, 52%);
    }

    a.proceed-btn {
      display: block;
      text-decoration: none;
      color: white;
      background-color: hsl(245, 75%, 52%);
      padding: 20px 0;
      border-radius: 12px;
      margin: 30px 0;
      transition: background-color .3s ease;
    }

    a.proceed-btn:hover {
      background-color: hsl(224, 23%, 55%);
    }

    a.cancel-btn {
      color: hsl(224, 23%, 55%);
      text-decoration: none;
      font-weight: 900;
      transition: color .3s ease;
    }

    a.cancel-btn:hover {
      color: hsl(223, 47%, 23%);
    }

    @media only screen and (max-width: 425px) {
      body {
        background-image: url(https://www.digitshack.com/codepen/mentor1/pattern-background-mobile.svg);
        font-size: 14px;
      }

      .container {
        max-width: 87%;
      }

      .title {
        font-size: 23px;
      }

      div.plan-box {
        padding: 12px;
      }

      .plan-box-left div {
        margin-left: 10px;
      }

      a.proceed-btn,
      a.cancel-btn,
      .plan-box a {
        font-size: 13px;
      }

      .text-content {
        padding: 9% 7%;
      }
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
        <li><a href="cart.php">Cart <span><?php if (isset($_SESSION['cust_id'])) //{ //echo "[" . cart_count($cust_id) . "]";} 
                                          ?></span></a></li>
        <li><a id="login_signup"></a></li>
        <?php
      if (isset($_SESSION['mail']))
        echo "<li><a href='logout.php'>Logout</a></li>";
        ?>
      </ul>
    </nav>
  </header>
  <form action="./cancel-order.php" method="post">
    <?php
    foreach ($orders as $order) {
      $order_details = fetch_order_details($order['o_id']);
      // $temp =  json_encode($order_details);
      // echo $temp;
    ?>

      <!-- <div class="container">
      <div class="hero">
        <!--<img src="https://www.digitshack.com/codepen/mentor1/illustration-hero.svg" alt="">-->
      <!-- <img src="ambikaart.jpg" alt=""> -->
      </div>
      <div class="text-content">
        <h2 class="title">
          Order
        </h2>
        <p class="subtitle">
          Here are the order details:
          Order No: <?= $order['o_id'] ?>;
          <!-- <input type="hidden" name="<?= $order['o_id'] ?>" id="" > -->
        </p>
        <?php
        if (is_array($order_details)) {
          foreach ($order_details as $order_item) {
        ?>
            <div class="plan-box">
              <div class="plan-box-left">
                <!-- <img src="https://www.digitshack.com/codepen/mentor1/icon-music.svg" alt=""> -->
                <div> -->
                  <?php
                  $product = fetch_product($order_item['product_id']);
                  ?>
                  <h5><?= $product[0]['p_name']; ?></h5>
                  <p>Qty.<?= $order_item['quantity']; ?></p>
                </div>
              </div>
              Rs. <?= $order_item['rate']; ?>
            </div>
        <?php
          }
        }
        ?>
        <a href="homepagenew.php" class="proceed-btn">Home</a>
        <!-- <a href="#" class="cancel-btn">Cancel Order</a> -->
        <?php
        if (!is_cancelled($order['o_id'])) {
        ?>
          <button value="<?= $order['o_id'] ?>" name="cancel_order">Cancel Order</button>
        <?php
        }
        ?>
      </div>
      </div>
    <?php
    }
    ?>
  </form>
</body>

</html>