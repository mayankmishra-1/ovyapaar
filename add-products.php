<?php
$pname = $_POST['pname'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$desc = $_POST['desc'];
$category = $_POST['category'];
$image = file_get_contents($_FILES["image"]["tmp_name"]);


$con = new mysqli("localhost", "root", "Eniac@123", "ovyapaar");
if ($con->connect_error) {
    die($con->connect_error);
}
$stmt = $con->prepare("INSERT INTO product(p_name, unit, p_price, p_desc,p_image,category) VALUES(?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss",$pname, $unit, $price, $desc, $image, $category);
$stmt->execute();
echo "Product inserted";
header("location:add-products.html");

// $con->query($sql);

// if ($con->query($sql)) {
//     echo "Product added.";
// } else {
//     echo $con->error;
// }

// echo "Aal is well";
