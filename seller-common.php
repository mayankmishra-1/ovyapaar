<?php
require_once "./db.php";
function get_seller_name($mail)
{
    $con=new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql="select f_name from seller where mail='$mail'";
    $result = $con->query($sql);
    if($result->num_rows>0) {
        $row = $result->fetch_assoc();
    }
    return $row['f_name'];
}