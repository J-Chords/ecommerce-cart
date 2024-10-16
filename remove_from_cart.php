<?php
session_start();

if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Remove the product from the cart if it exists
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
        echo json_encode(['success' => true, 'message' => 'Product removed from cart']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Product not found in cart']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
