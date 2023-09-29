<?php
session_start();

// Check if order details and delivery address are set in session
if (!isset($_SESSION['order_details']) || !isset($_SESSION['delivery_address'])) {
    die("Order details or delivery address not found");
}

$orderDetails = $_SESSION['order_details'];
$deliveryAddress = $_SESSION['delivery_address'];
$totalAmount = 0;
foreach ($orderDetails as $product) {
    $totalAmount += $product['price']; // Calculate total amount
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Thank You!</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Thank You for Your Order!</h2>
        <p>Your order has been placed successfully.</p>

        <h3>Order Details</h3>
        <?php foreach ($orderDetails as $index => $product) : ?>
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
        <?php endforeach; ?>
        <hr>
        <h4>Total Amount: <?php echo $totalAmount; ?> €</h4>

        <h3>Delivery Address</h3>
        <p>Name: <?php echo $deliveryAddress['name']; ?></p>
        <p>Email: <?php echo $deliveryAddress['email']; ?></p>
        <p>Phone: <?php echo $deliveryAddress['phone']; ?></p>
        <p>Address: <?php echo nl2br($deliveryAddress['address']); ?></p>
        <p>City: <?php echo $deliveryAddress['city']; ?></p>
        <p>ZIP Code: <?php echo $deliveryAddress['zip']; ?></p>

        <a href="index.php" class="btn btn-primary mt-3">Continue Shopping</a>
    </div>
</body>

</html>
<?php
// Unset sessions as they are no longer needed
unset($_SESSION['order_details']);
unset($_SESSION['delivery_address']);
unset($_SESSION['cart']); // You might also want to unset the cart session
?>