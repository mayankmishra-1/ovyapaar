<?php
function delete_from_cart($cart_id)
{
    $con = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $sql = "DELETE FROM cart WHERE cart_id=$cart_id";
    $con->query($sql);
}