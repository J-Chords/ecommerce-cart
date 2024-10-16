<?php
session_start();
require 'db.php';

// Fetch products from the database
$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <!-- FontAwesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</head>
<body>
    <div class="container mt-4">
        <!-- User profile and cart link -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="user-profile">
                <img src="assets/images/user-icon.png" alt="User" class="rounded-circle" style="width: 40px; height: 40px;">
                <span>Welcome, User</span>
            </div>
            <a href="cart.php" class="btn btn-outline-primary">
                <i class="fas fa-shopping-cart"></i> View Cart
            </a>
        </div>
        
        <!-- Product listing -->
        <h1 class="text-center mb-4">Products</h1>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/images/<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                            <p class="text-success">$<?= number_format($product['price'], 2) ?></p>
                            <button class="btn btn-success add-to-cart" data-id="<?= $product['id'] ?>">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- jQuery Script for Add to Cart functionality -->
    <script>
        $(document).on('click', '.add-to-cart', function() {
            const productId = $(this).data('id');
            $.ajax({
                url: 'add_to_cart.php',
                method: 'POST',
                data: { product_id: productId },
                success: function(response) {
                    const result = JSON.parse(response);
                    if (result.status === 'success') {
                        alert('Product added to cart!');
                    } else {
                        alert(result.message);
                    }
                },
                error: function() {
                    alert('An error occurred while adding the product to the cart.');
                }
            });
        });
    </script>
</body>
</html>
