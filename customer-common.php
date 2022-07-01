<?php
require_once "./db.php";
function fetch_customer_address($cid)
{
    $address = null;
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "select locality, city, state, country from customer where cust_id='$cid'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
      $address = $result->fetch_all(MYSQLI_ASSOC);
    }
    return $address;
}

function get_customer_name_by_cid($cid)
{
    $con=new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql="select f_name from customer where cust_id='$cid'";
    $result = $con->query($sql);
    if($result->num_rows>0) {
        $row = $result->fetch_assoc();
    }
    return $row['f_name'];
}