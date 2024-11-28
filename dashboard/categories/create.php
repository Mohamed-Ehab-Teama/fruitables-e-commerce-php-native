<?php

require_once '../../connection.php';

if ( !$_SERVER['REQUEST_METHOD'] == 'POST' )
{
    header('location:../index.php');
    die;
}

$category = $_POST['category'];


if ( empty($category) )
{
    $_SESSION['error'] = " Category Name Cannot be Empty ";
    header('location:../categories.php');
    die;
}


$category = mysqli_real_escape_string( $connection, $category);


$sql = " INSERT INTO categories (category) VALUES ('$category') ";
$res = mysqli_query( $connection, $sql );

if ( $res )
{
    $_SESSION['success'] = " Category created Successfully ";
    header('location:../categories.php');
    die;
}
else
{
    $_SESSION['error'] = " Something Went Wrong ";
    header('location:../categories.php');
    die;
}
