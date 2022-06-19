<?php
require_once "./db.php";
function fetch_all_orders($sid)
{
    $orders=null;
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT * FROM orders WHERE s_id='$sid'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $orders = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return "No orders found";
    }
    return $orders;
}

function fetch_fullfilled_orders()
{
}

function fetch_active_orders()
{
}

function fetch_cancelled_orders()
{
}

function fetch_cart($cust_id)
{
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT * FROM cart WHERE cust_id='$cust_id'";
    $result = $con->query($sql);
    if($result->num_rows>0) {
        $cart = $result->fetch_all(MYSQLI_ASSOC);
        return $cart;
    } else {
        return "Cart empty!";
    }
}
