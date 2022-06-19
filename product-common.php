<?php
require_once "./db.php";

function fetch_product($product_id)
{
    $product = null;
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT * FROM product WHERE product_id='$product_id'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $product = $result->fetch_all(MYSQLI_ASSOC);
        return $product;
    } else {
        return "No product found!";
    }
}

function fetch_all_products($sid)
{
    $products = null;
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "SELECT * FROM product WHERE s_id='$sid'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $product = $result->fetch_all(MYSQLI_ASSOC);
        return $product;
    } else {
        return "No product found!";
    }
}
