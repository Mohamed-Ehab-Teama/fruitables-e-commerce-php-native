<?php

session_start();

$host = 'localhost';
$DBUserName = 'root';
$DBUserPass = '';
$DBName = 'e-commerce-php-native';


$connection = mysqli_connect( $host, $DBUserName, $DBUserPass, $DBName );

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='{$row['product']}' style='width:150px;'>";
