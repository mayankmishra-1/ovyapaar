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
      <li><a href="cart.php">Cart <span><?php if(isset($_SESSION['cust_id'])) { echo "[" . cart_count($cust_id) . "]";} ?></span></a></li>
      <li><a id="login_signup"></a></li>
      <!-- <?php
    //   if (isset($_SESSION['mail']))
    //     echo "<li><a href='logout.php'>Logout</a></li>";
      ?> -->
    </ul>
  </nav>
</header>
  <div class="container">
    <div class="hero">
      <!--<img src="https://www.digitshack.com/codepen/mentor1/illustration-hero.svg" alt="">-->
      <img src="ambikaart.jpg" alt="" height="200" width="400">
    </div>
    <div class="text-content">
      <h2 class="title">
        Order Confirmation
      </h2>
      <p class="subtitle">
        Your order has with order no: 7 has been received
      </p>
      <!-- <?php
    //   foreach ($order_details as $order_item) {
      ?> -->
        <div class="plan-box">
          <div class="plan-box-left">
            <!-- <img src="https://www.digitshack.com/codepen/mentor1/icon-music.svg" alt=""> -->
            <div>
              
               <h5>Terracotta Vase</h5> 
              <p>Qty.1</p>
            </div>
          </div>
          Rs. 600
        </div>
        <div class="plan-box">
          <div class="plan-box-left">
            <!-- <img src="https://www.digitshack.com/codepen/mentor1/icon-music.svg" alt=""> -->
            <div>
              
               <h5>Tussar Silk Saree</h5> 
              <p>Qty.1</p>
            </div>
          </div>
          Rs. 3000
        </div>
      <a href="homepagenew.php" class="proceed-btn">Proceed</a>
      <a href="#" class="cancel-btn">Cancel Order</a>
    </div>
  </div>
  <!-- for youtube -->
  <!--<a href="https://youtu.be/rCBYZ7xn-us" target="_blank" class="link">Watch on youtube <i class="fab fa-youtube"></i></a>-->
</body>

</html>