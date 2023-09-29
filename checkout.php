<?php
session_start();

// Initialize cart in session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cart = $_SESSION['cart']; // Get cart from session

$totalAmount = 0;
foreach ($cart as $product) {
    $totalAmount += $product['price']; // Calculate total amount
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Checkout</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Checkout</h2>
        <?php foreach ($cart as $index => $product) : ?>
            <?php if ($product != null) : ?>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <img src="<?php echo $product['image']; ?>" class="img-fluid" alt="<?php echo $product['title']; ?>">
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title"><?php echo $product['title']; ?></h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <p class="card-text">Price: <?php echo $product['price']; ?> €</p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <hr>
        <h4>Total Amount: <?php echo $totalAmount; ?> €</h4>
        <a href="cart.php" class="btn btn-secondary mb-3">Back to Cart</a>
        
        <!-- Delivery Address Form -->
        <form action="process_checkout.php" method="post">
            <h3>Delivery Address</h3>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
            <div class="form-group">
                <label for="zip">ZIP Code:</label>
                <input type="text" class="form-control" id="zip" name="zip" required>
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</body>

</html>
