<?php

require_once '../../connection.php';

if ( !$_SERVER['REQUEST_METHOD'] == 'POST' )
{
    header('location:../index.php');
    die;
}

foreach ( $_POST as $key => $value )
{
    $$key = $value;
}

// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";

// $product
// $description
// $price
// $category
// $image


if ( empty($product) or empty($description) or empty($price) or empty($category) )
{
    $_SESSION['error'] = " Fields Cannot be Empty ";
    header('location:../products.php');
    die;
}


$product = mysqli_real_escape_string( $connection, $product);
$description = mysqli_real_escape_string( $connection, $description);
$price = mysqli_real_escape_string( $connection, $price);
$category = mysqli_real_escape_string( $connection, $category);


// Handle Image Upload
$image = $_FILES['image'];
$image_tmp = $image['tmp_name'];
$image_error = $image['error'];


if ( $image_error == 0 ) {

    // Get the binary data of the image
    $image_data = addslashes(file_get_contents($image_tmp));


    $sql = " INSERT INTO products (product, description, price, category_id, image) VALUES ('$product', '$description', '$price', '$category', '$image_data' ) ";
    $res = mysqli_query( $connection, $sql );

    if ( $res )
    {
        $_SESSION['success'] = " Product Added Successfully ";
        header('location:../products.php');
        die;
    }
    else
    {
        $_SESSION['error'] = " Something Went Wrong ";
        header('location:../products.php');
        die;
    }
}
else {
    $_SESSION['error'] = " Image Upload Went Wrong ";
    header('location:../products.php');
    die;
}