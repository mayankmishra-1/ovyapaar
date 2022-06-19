<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "./db.php";
$display = "Login/SignUp";
if (isset($_SESSION['mail'])) {
    $mail = $_SESSION['mail'];
    $display = "Welcome! " . get_customer_name("$mail");
}
?>

<div class="site-identity">
    <a href="homepagenew.php"><img src="ovyapaar.png" alt="O-Vyapaar"></a>
</div>
<nav class="site-navigation">
    <ul class="nav">
        <li><a href="contact.html">Contact</a></li>
        <li>Products</li>
        <li><a id="login_signup"><?= $display ?></a></li>
        <?php
        if (isset($_SESSION['mail']))
            echo "<li><a href='logout.php'>Logout</a></li>";
        ?>
    </ul>
</nav>