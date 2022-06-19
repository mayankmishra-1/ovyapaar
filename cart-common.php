<?php
require_once "./db.php";

function fetch_cart($cid)
{
    $cart=null;
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT * FROM cart WHERE cust_id='$cid'";
    $result = $con->query($sql);
    if($result->num_rows>0) {
        $cart=$result->fetch_all(MYSQLI_ASSOC);
    }
    return $cart;
}

function clear_cart($cid)
{
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "DELETE FROM cart WHERE cust_id='$cid'";
    $con->query($sql);
}
