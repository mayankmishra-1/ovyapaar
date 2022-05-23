<?php
$pname = $_POST['pname'];
$unit = $_POST['unit'];
$price = $_POST['price'];
$desc = $_POST['desc'];
// $image=$_POST['image'];
$category = $_POST['category'];
echo $_FILES["image"]["name"];
$status = $statusmsg = '';
$status = 'error';
if (!empty($_FILES["image"]["name"])) {
    echo "Till here aal is well";
    $file_name = basename($_FILES["image"]["name"]);
    $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

    echo $file_name . ", " . $file_type;

    $allow_types = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($file_type, $allow_types)) {
        $image = $_FILES['image']['tmp_name'];
        $img_content = addslashes(file_get_contents($image));


        $con = new mysqli("localhost", "root", "Eniac@123", "ovyapaar");
        if ($con->connect_error) {
            die($con->connect_error);
        }

        // $sql = "INSERT INTO product(p_name, unit, p_price, p_desc,p_image,category) VALUES('$pname', '$unit', '$price', '$desc', '$img_content', '$category')";
        // if ($con->query($sql)) {
        //     echo "Product added.";
        // } else {
        //     echo $con->error;
        // }
    } else {
        echo "Not an image";
    }
}
