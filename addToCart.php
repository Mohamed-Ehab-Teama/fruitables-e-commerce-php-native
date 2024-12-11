<?php

require_once './connection.php';

$user_id = $_SESSION['user_id'];

foreach ($_GET as $key => $value) {
    $$key = $value;
}
// $id
// $product
// $price


$sql = " INSERT INTO cart (product, product_id, price, Total, user_id) VALUES ('$product', '$id', '$price', '$price', '$user_id') ";
$res = mysqli_query( $connection, $sql );

if ( $res ){
    header('location:index.php');
}else{
    header('location:cart.php?error=Something Went Wrong');
}