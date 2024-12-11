<?php

require_once './functions.php';

$user_id = $_SESSION['user_id'];

$total_price = $_GET['total'] ;

$insertSQL = " INSERT INTO orders (user_id, total_price) VALUES ( '$user_id', '$total_price' ) ";
$insertRES = mysqli_query ( $connection, $insertSQL );

$delSQL = " DELETE FROM cart WHERE user_id = '$user_id' ";

if ( $insertRES )
{
    $delRES = mysqli_query( $connection, $delSQL );
    $_SESSION['success'] = " Order Completed Successfully ";
    header('location:cart.php' );
    die;
}else{
    header('location:cart.php' );
    $_SESSION['error'] = " Somethin went wrong ";
    die;
}