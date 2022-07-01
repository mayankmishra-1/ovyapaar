<?php
require_once "./customer-common.php";
session_start();
$cid = $_SESSION['cust_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="address.css">
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
      <img src="ambikaart.jpg" alt="" height="200" width="400">
    </div>
    <div class="text-content">
      <h2 class="title">
        Address Confirmation
      </h2>
      <p class="subtitle">
        Select the address or enter a new one:
      </p>
      <div class="plan-box">
        <div class="plan-box-left">
          <!-- <img src="https://www.digitshack.com/codepen/mentor1/icon-music.svg" alt=""> -->
          <div>
            <input type="radio">
            <?php
                $address = fetch_customer_address($cid);
            ?>
            <h5><?= $address[0]['locality'];?>,  <?= $address[0]['city'];?></h5>
            <p><?= $address[0]['state'];?></p>
          </div>
        </div>
        <a href="customer-account-setting.php">Edit</a>
      </div>
      <a href="ordersummary.php" class="proceed-btn">Proceed</a>
      <a href="homepagenew.php" class="cancel-btn">Cancel Order</a>
    </div>
  </div>
  <!-- for youtube -->
  <!--<a href="https://youtu.be/rCBYZ7xn-us" target="_blank" class="link">Watch on youtube <i class="fab fa-youtube"></i></a>-->
</body>

</html>