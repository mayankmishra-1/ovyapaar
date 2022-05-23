<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
require_once "./db.php";
require_once "./product-controller.php";
$display = "Login/SignUp";
if (isset($_SESSION['mail'])) {
  $display = "Welcome! " . $_SESSION['mail'];
}
?>

<header class="site-header">
  <div class="site-identity">
    <a href="homepagenew.php"><img src="ovyapaar.png" alt="O-Vyapaar"></a>
    <input type="text" placeholder="Search..">
  </div>
  <nav class="site-navigation">
    <ul class="nav">
      <li><a href="#">Category</a></li>
      <li><a href="cart.php">Cart <span>[<?= cart_count($cust_id); ?>]</span></a></li>
      <li><a id="login_signup"><?= $display ?></a></li>
      <?php
      if (isset($_SESSION['mail']))
        echo "<li><a href='logout.php'>Logout</a></li>";
      ?>
    </ul>
  </nav>
</header>