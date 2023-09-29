<?php
session_start();

if (!isset($_SESSION['products'])) {
    die("Products not found in session");
}

$index = isset($_GET['index']) ? $_GET['index'] : null;
if ($index === null || !array_key_exists($index, $_SESSION['products'])) {
    die("Invalid product index");
}

$product = $_SESSION['products'][$index];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?php echo $product['title']; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $product['image']; ?>" class="img-fluid" alt="<?php echo $product['title']; ?>">
            </div>
            <div class="col-md-6">
                <h5 class="card-title"><?php echo $product['title']; ?></h5>
                <p class="card-text"><?php echo $product['description']; ?></p>
                <p class="card-text">Prix: <?php echo $product['price']; ?> €</p> <!-- Displaying the price -->
                <a href="cart.php?action=add&index=<?php echo $index; ?>" class="btn btn-primary">Ajouter au panier</a>
                <a href="edit.php?index=<?php echo $index; ?>" class="btn btn-secondary">Edit</a>
                <a href="index.php" class="btn btn-secondary">Back to Products</a> <!-- Button to go back to index.php -->
            </div>
        </div>
    </div>
</body>
</html>
