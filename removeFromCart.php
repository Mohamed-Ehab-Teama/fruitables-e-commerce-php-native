<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];

    // Retrieve the cart from cookies
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    // Remove the item from the cart if it exists
    if (isset($cart[$productId])) {
        unset($cart[$productId]);

        // Update the cart cookie
        setcookie('cart', json_encode($cart), time() + (86400 * 7), "/");
    }

    // Redirect back to the cart page
    header("Location: cart.php");
    exit;
}

