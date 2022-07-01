<?php
require_once "./db.php";
session_start();
$cid=$_SESSION['cust_id'];
$locality = $_POST['locality'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$password = $_POST['password'];


$con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
if($con->connect_error) {
    die($con->connect_error);
}

$sql = "Update customer set locality = '$locality', city = '$city', state='$state', country='$country', password='$password' where cust_id='$cid'";
if($con->query($sql)) {
    header("location:customer-account-setting.php");
} else {
    echo $con->error;
}