<?php
session_start();

$response = ['success' => false, 'message' => 'An error occurred.'];

if (isset($_POST['product_id'], $_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    // Ensure quantity is at least 1
    if ($quantity < 1) {
        $quantity = 1;
    }

    // Update the quantity in the session cart
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = $quantity;
        $response['success'] = true;
        $response['message'] = 'Quantity updated successfully.';
    } else {
        $response['message'] = 'Product not found in cart.';
    }
}

// Return JSON response
echo json_encode($response);
