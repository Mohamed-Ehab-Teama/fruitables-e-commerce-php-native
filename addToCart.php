<?php

require_once './connection.php';


foreach ($_GET as $key => $value) {
    $$key = $value;
}
// $id
// $product
// $price


$sql = " INSERT INTO cart (product, product_id, price, Total) VALUES ('$product', '$id', '$price', '$price') ";
$res = mysqli_query( $connection, $sql );

if ( $res ){
    header('location:index.php');
}else{
    header('location:cart.php?error=Something Went Wrong');
}