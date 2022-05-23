<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once "./db.php";
require_once "./product-controller.php";
require_once "./customer-controller.php";
$display = "Login/SignUp";
if (isset($_SESSION['mail'])) {
  $mail = $_SESSION['mail'];
  $display = "Welcome! " . get_customer_name("$mail");
}
?>

<header class="site-header">
  <div class="site-identity">
    <a href="homepagenew.php"><img src="ovyapaar.png" alt="O-Vyapaar"></a>
  </div>
  <nav class="site-navigation">
    <ul class="nav">
      <li><input type="text" placeholder="Search.."></li>
      <li><a href="contact.html">Contact</a></li>
      <li><a href="cart.php">Cart <span><?php if(isset($_SESSION['cust_id'])) { echo "[" . cart_count($cust_id) . "]";} ?></span></a></li>
      <li><a id="login_signup"><?= $display ?></a></li>
      <?php
      if (isset($_SESSION['mail']))
        echo "<li><a href='logout.php'>Logout</a></li>";
      ?>
    </ul>
  </nav>
</header>