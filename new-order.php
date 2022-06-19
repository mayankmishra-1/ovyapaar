<?php
require_once "./db.php";
require_once "./cart-common.php";
session_start();
$cid = $_SESSION['cust_id'];
$cart = fetch_cart($cid);
$sid = 1;
$con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
$sql = "INSERT INTO orders(o_date, o_time, cust_id, s_id, status) VALUES(CURDATE(), CURTIME(), $cid, $sid, 'A')";
if($con->query($sql)) {
    foreach($cart as $cart_item) {
        $pid = $cart_item['product_id'];
        $qty = $cart_item['quantity'];
        $rate = $cart_item['price'];
        $sql = "INSERT INTO orderdetail VALUES(1, $pid, $qty, $rate)";
        if($con->query($sql)) {
            header("location:orderconfirmation.php");
        } else {
            $con->error;
        }
    }
} else {
    echo $con->error;
}