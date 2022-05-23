<?php
if(!session_status() === PHP_SESSION_NONE) {
    session_start();
}
$cust_id = $_SESSION['cust_id'];

require_once "./db.php";

function cart_count($cust_id)
{
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT COUNT(cart_id) FROM cart WHERE cust_id=$cust_id";
    $result = $con->query($sql);
    if($result->num_rows>0) {
        $row = $result->fetch_array();
    }
    return $row[0];
}

function get_product_name($product_id)
{
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT p_name FROM product WHERE product_id=$product_id";
    $result = $con->query($sql);
    if($result->num_rows>0) {
        $row = $result->fetch_array();
    }
    return $row[0];
}