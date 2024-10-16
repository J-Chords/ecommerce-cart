<?php
session_start();
require 'db.php';

// Fetch cart items from session or database
$cart = $_SESSION['cart'] ?? [];

// Fetch products in the cart
$cartItems = [];
foreach ($cart as $productId => $quantity) {
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product) {
        $product['quantity'] = $quantity;
        $cartItems[] = $product;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">
            <i class="fas fa-shopping-cart"></i> Your Cart
        </h1>
        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty.</p>
            <a href="index.php" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Continue Shopping
            </a>
        <?php else: ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach ($cartItems as $item): ?>
                        <?php
                        $subtotal = $item['price'] * (int)$item['quantity'];
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td>$<?= number_format($item['price'], 2) ?></td>
                            <td>
                                <input type="number" class="form-control quantity-input" value="<?= $item['quantity'] ?>" min="1" data-id="<?= $item['id'] ?>">
                            </td>
                            <td>$<?= number_format($subtotal, 2) ?></td>
                            <td>
                                <button class="btn btn-danger btn-sm remove-from-cart" data-id="<?= $item['id'] ?>">Remove</button>
                                <button class="btn btn-info btn-sm update-quantity" data-id="<?= $item['id'] ?>">Update</button>
                            </td>
                        </tr>
                        <?php $total += $subtotal; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <h3 class="text-right">Total: $<?= number_format($total, 2) ?></h3>
            <a href="index.php" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Continue Shopping
            </a>
            <button id="checkout-button" class="btn btn-success">
                <i class="fas fa-check"></i> Checkout
            </button>
        <?php endif; ?>
    </div>

    <script>
        // Handle removing items from the cart using AJAX
        $(document).on('click', '.remove-from-cart', function () {
            const productId = $(this).data('id');

            $.ajax({
                url: 'remove_from_cart.php',
                method: 'POST',
                data: { product_id: productId },
                success: function (response) {
                    const result = JSON.parse(response);
                    if (result.success) {
                        alert(result.message);
                        location.reload(); // Refresh to show updated cart contents
                    } else {
                        alert('Failed to remove the product. Please try again.');
                    }
                },
                error: function () {
                    alert('An error occurred. Please try again.');
                }
            });
        });

        // Handle updating quantity using AJAX
        $(document).on('click', '.update-quantity', function () {
            const productId = $(this).data('id');
            const newQuantity = $(this).closest('tr').find('.quantity-input').val();

            $.ajax({
                url: 'update_quantity.php',
                method: 'POST',
                data: { product_id: productId, quantity: newQuantity },
                success: function (response) {
                    const result = JSON.parse(response);
                    if (result.success) {
                        alert(result.message);
                        location.reload(); // Refresh to show updated cart contents
                    } else {
                        alert('Failed to update quantity. Please try again.');
                    }
                },
                error: function () {
                    alert('An error occurred. Please try again.');
                }
            });
        });

        // Handle checkout button click with a success message
        $('#checkout-button').on('click', function () {
            alert('Successfully purchased!');
        });
    </script>
</body>
</html>
