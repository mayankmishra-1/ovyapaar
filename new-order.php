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
    $sql = "SELECT LAST_INSERT_ID()";
    $result = $con->query($sql);
    $last_id = $result->fetch_array(); 
    foreach($cart as $cart_item) {
        $pid = $cart_item['product_id'];
        $qty = $cart_item['quantity'];
        $rate = $cart_item['price'];
        $sql = "INSERT INTO orderdetail VALUES($last_id[0], $pid, $qty, $rate)";
        if($con->query($sql)) {
            clear_cart($cid);
            $_SESSION['order_id'] = $last_id[0];
            header("location:orderconfirmation.php");
        } else {
            $con->error;
        }
    }
} else {
    echo $con->error;
}