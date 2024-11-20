<?php

session_start();

$host = 'localhost';
$DBUserName = 'root';
$DBUserPass = '';
$DBName = 'e-commerce-php-native';


$connection = mysqli_connect( $host, $DBUserName, $DBUserPass, $DBName );