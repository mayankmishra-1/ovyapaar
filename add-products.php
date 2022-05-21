<?php
$pname=$_POST['pname'];
$unit=$_POST['unit'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$image=$_POST['image'];
$category=$_POST['category'];

$con = new mysqli("localhost", "root", "Eniac@123", "ovyapaar");
if($con->connect_error) {
    die($con->connect_error);
}

$sql = "INSERT INTO product(p_name, unit, p_price, p_desc,p_image,category) VALUES('$pname', '$unit', '$price', '$desc', '$image', '$category')";
if($con->query($sql)) {
    echo "Product added.";
} else {
    echo $con->error;
}