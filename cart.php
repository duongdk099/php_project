<?php
session_start();

// Initialize products from session
$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];

// Initialize cart in session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = isset($_GET['action']) ? $_GET['action'] : '';
$index = isset($_GET['index']) ? $_GET['index'] : null;

if ($action === 'add' && array_key_exists($index, $products)) {
    $_SESSION['cart'][$index] = $products[$index];
}

if ($action === 'remove' && array_key_exists($index, $_SESSION['cart'])) {
    unset($_SESSION['cart'][$index]);
}

if ($action === 'clear') {
    $_SESSION['cart'] = [];
}

$totalPrice = 0; // Initialize total price
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Panier</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <?php foreach ($_SESSION['cart'] as $index => $product) : ?>
            <?php if ($product != null) : ?>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <img src="<?php echo $product['image']; ?>" class="img-fluid" alt="<?php echo $product['title']; ?>">
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title"><?php echo $product['title']; ?></h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <p class="card-text">Price: <?php echo $product['price']; ?> €</p> <!-- Displaying the price -->
                        <a href="cart.php?action=remove&index=<?php echo $index; ?>" class="btn btn-danger">Remove from cart</a>
                    </div>
                </div>
                <?php $totalPrice += $product['price']; ?> <!-- Calculating total price -->
            <?php endif; ?>
        <?php endforeach; ?>
        <h4>Total Price: <?php echo $totalPrice; ?> €</h4> <!-- Displaying total price -->
        <a href="cart.php?action=clear" class="btn btn-warning">Clear Cart</a>
        <a href="checkout.php" class="btn btn-primary">Commander</a>
        <a href="index.php" class="btn btn-secondary">Back to Products</a> <!-- Button to go back to index.php -->
    </div>
</body>

</html>
