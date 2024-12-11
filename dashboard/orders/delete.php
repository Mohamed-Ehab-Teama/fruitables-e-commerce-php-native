<?php

require_once '../../connection.php';

$id = $_GET['id'];

$sql = " DELETE FROM orders WHERE id = '$id' ";
mysqli_query ( $connection, $sql );

header('location:../orders.php');