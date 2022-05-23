<?php
require_once "./db.php";
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$locality = $_POST['locality'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$dob = $_POST['dob'];
$number = $_POST['number'];
$email = $_POST['mail'];
$password = $_POST['password'];


$con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
if($con->connect_error) {
    die($con->connect_error);
}

$sql = "INSERT INTO customer(f_name, m_name, l_name, locality, city, state, country, dob, number, mail, password) VALUES('$fname','$mname','$lname','$locality','$city','$state','$country','$dob','$number', '$email', '$password')";
if($con->query($sql)) {
    header("location:customer-login.html");
} else {
    echo $con->error;
}