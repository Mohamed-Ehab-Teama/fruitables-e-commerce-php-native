<?php
include './connection.php';

$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

if (!empty($cart)) {

    if (!isset($_SESSION['user_id'])){
        header('location:login.php');
        die;
    }

    $userId = $_SESSION['user_id']; // Assuming a logged-in user

    // Create a new order
    $sql = " INSERT INTO orders (user_id) VALUES ('$userId') ";
    $res = mysqli_query( $connection, $sql );
    $orderId = mysqli_insert_id($connection);


    // Insert each cart item into order_items
    foreach ($cart as $productId => $item) {
        $quantity = $item['quantity'];
        $price = $item['price'];
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                      VALUES ($orderId, $productId, $quantity, $price)";
        $res = mysqli_query($connection, $sql);

    }

    // Clear the cart cookie
    setcookie('cart', '', time() - 3600, "/");
    $_SESSION['success'] = "Order placed successfully!";
    header('location:cart.php');
    die;
} else {
    $_SESSION['error'] = "Your cart is empty.";
    header('location:cart.php');
    die;
}
