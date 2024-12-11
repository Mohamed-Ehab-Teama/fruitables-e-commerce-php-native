<?php 

require_once './connection.php';

$id = $_GET['id'];

$sql = " DELETE FROM cart WHERE id = '$id' ";

$res = mysqli_query( $connection, $sql );

if ($res){
    header('location:cart.php');
}else{
    header('location:cart.php?error=Something Went Wrong');
}

