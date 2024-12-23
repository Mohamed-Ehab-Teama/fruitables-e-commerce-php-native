<?php

require_once '../../connection.php';

$id = $_GET['id'];

$sql = " DELETE FROM order_items WHERE order_id = '$id' ";
mysqli_query ( $connection, $sql );

$sql = " DELETE FROM orders WHERE id = '$id' ";
mysqli_query ( $connection, $sql );

header('location:../orders.php');