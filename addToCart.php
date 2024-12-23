<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Initialize or retrieve the cart from cookies
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Update or add the item in the cart
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += $quantity;
    } else {
        // Fetch product details
        include './connection.php';
        $sql = "SELECT * FROM products WHERE id = '$productId' ";
        $result = mysqli_query($connection , $sql);
        $product = mysqli_fetch_assoc($result);

        $cart[$productId] = [
            'name' => $product['product'],
            'price' => $product['price'],
            'quantity' => $quantity,
        ];
    }

    // Save the cart back to cookies
    setcookie('cart', json_encode($cart), time() + (86400 * 7), "/");
    header("Location:cart.php");
    exit;
}

