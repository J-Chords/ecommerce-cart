<?php
session_start();

if (isset($_POST['product_id'], $_POST['quantity'])) {
    $productId = (int)$_POST['product_id'];
    $quantity = max(1, (int)$_POST['quantity']);

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] = $quantity;
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Product not in cart']);
    }
}
?>
