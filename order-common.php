<?php
require_once "./db.php";

function fetch_order($oid)
{
    $orders=null;
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT * FROM orders WHERE o_id='$oid'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $orders = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return "No orders found";
    }
    return $orders;
}

function fetch_order_details($oid)
{
    $order_details=null;
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT * FROM orderdetail WHERE o_id='$oid'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $order_details = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return "No orders found";
    }
    return $order_details;
}

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

function count_orders($type, $sid)
{
    $count = 0;
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT COUNT(o_id) FROM orders WHERE s_id='$sid' AND status='$type'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
        $count =$row[0];
    } else {
        return "No orders found";
    }
    return $count;
}

function fetch_fullfilled_orders()
{
}

function fetch_active_orders($sid)
{
    $orders=null;
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT * FROM orders WHERE s_id='$sid' AND status='A'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $orders = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return "No orders found";
    }
    return $orders;
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

function mail_order()
{

}