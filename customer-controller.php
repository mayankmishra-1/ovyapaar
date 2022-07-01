<?php
require_once "./db.php";
function get_customer_name($mail)
{
    $con=new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql="select f_name from customer where mail='$mail'";
    $result = $con->query($sql);
    if($result->num_rows>0) {
        $row = $result->fetch_assoc();
    }
    return $row['f_name'];
}
function get_customer_details($cid)
{
    $con=new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql="select * from customer where cust_id='$cid'";
    $result = $con->query($sql);
    if($result->num_rows>0) {
        $row = $result->fetch_assoc();
    }
    return $row;
}