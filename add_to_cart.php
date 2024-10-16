<?php
session_start();
require 'db.php';

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Check if the cart session exists, if not create it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // If the product already exists in the cart, increase its quantity
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]++;
    } else {
        // Otherwise, add the product with a quantity of 1
        $_SESSION['cart'][$productId] = 1;
    }

    echo json_encode(['success' => true, 'message' => 'Product added to cart']);
} else {
    echo json_encode(['success' => false, 'message' => 'Product ID not provided']);
}
?>
