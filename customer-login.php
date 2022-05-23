<?php
$mail = $_POST['identifier'];
$password = $_POST['password'];
$con = new mysqli("localhost","root", "Eniac@123", "ovyapaar");
if($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$sql = "select * from customer where mail='$mail' AND password='$password'";
$result = $con->query($sql);
if($result->num_rows>0) {
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['mail'] = $mail;
    $_SESSION['cust_id'] = $row['cust_id'];
    header("location:homepagenew.php");
} else {
    echo "Invalid User Id/Password";
}