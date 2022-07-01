<?php
require_once "./customer-controller.php";
session_start();
$cid = $_SESSION['cust_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="app.css"> -->
    <link rel="stylesheet" href="homepagenew.css">
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="customer-registration.css">
    <title>Account Settings</title>
</head>
<style>
    h1 {
        text-align: center;
    }
    input[type="text"]::placeholder{
    font-size: 14px;
    color: black;
}
</style>
<body>
    <header class="site-header">
        <div class="site-identity">
          <a href="homepagenew.php"><img src="ovyapaar.png" alt="O-Vyapaar"></a>
        </div>
        <nav class="site-navigation">
          <ul class="nav">
            <!-- <li><a id="login_signup">Logout</a></li> -->
          </ul>
        </nav>
      </header>
      <!-- <button onclick="history.back()">Back</button> -->
      <div class="sidenav">
        <a href="homepagenew.php">Home</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
      </div><br><br><br><br><br>
      <h1>Account Settings</h1>
    <div class="container">
        <form action="customeraccountsetting.php" method="post" class="center-form">
        <?php
              $customer = get_customer_details($cid);
              ?>
               <label>Name:</label><br>
            <input type="text" id="fname" name="fname" value="<?=$customer['f_name']?> <?=$customer['m_name']?> <?=$customer['l_name']?>"><br><br>
            <label>Mail:</label><br>
            <input type="text" id="mname" name="mname" value="<?=$customer['mail']?>"><br><br>
            <label>Locality:</label><br>
            <input type="text" id="locality" name="locality" value="<?=$customer['locality']?>"><br><br>
            <label>City:</label><br>
            <input type="text" id="city" name="city" value="<?=$customer['city']?>"><br><br>
            <label>State:</label><br>
            <input type="text" id="state" name="state" value="<?=$customer['state']?>"><br><br>
            <label>Country:</label><br>
            <input type="text" id="country" name="country" value="<?=$customer['country']?>"><br><br>           
            <input type="password" id="password" name="password" placeholder="Enter New Password:*"><br><br>
            <input type="password" id="passwordc" name="passwordc" placeholder="Confirm Password:*"><br><br>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </div>
</body>
</html>