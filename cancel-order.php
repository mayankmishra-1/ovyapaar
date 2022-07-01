<?php
require_once "./db.php";
$oid = $_POST['cancel_order'];
$con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
$sql = "UPDATE orders SET status = 'C' WHERE o_id=$oid";
if ($con->query($sql)) {
    echo "Order Cancelled!";
} else {
    echo $con->error;
}
