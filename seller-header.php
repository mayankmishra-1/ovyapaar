<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "./db.php";
require_once "./seller-common.php";
$display = "Login/SignUp";
if (isset($_SESSION['mail'])) {
    $mail = $_SESSION['mail'];
    $display = "Welcome! " . get_seller_name("$mail");
} else {
    header("location:Seller-login.html");
}
?>
<header class="site-header">
<div class="site-identity">
    <a href="seller-dashboard.php"><img src="ovyapaar.png" alt="O-Vyapaar"></a>
</div>
<nav class="site-navigation">
    <ul class="nav">
        <li><a href="add-products.html">Add Products</a></li>
        <li><a id="login_signup"><?= $display ?></a></li>
        <?php
        if (isset($_SESSION['mail']))
            echo "<li><a href='logout.php'>Logout</a></li>";
        ?> -->
    </ul>
</nav>
</header>