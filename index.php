<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$products = [
    [
        'index' => 0,
        'title' => 'Produit 1',
        'description' => 'Ceci est la description du produit 1.',
        'image' => 'image1.jpg',
        'price' => 20.00 // Example price

    ],
    [
        'index' => 1,
        'title' => 'Produit 2',
        'description' => 'Ceci est la description du produit 2.',
        'image' => 'image1.jpg',
        'price' => 200.00 // Example price
    ],
    [
        'index' => 2,
        'title' => 'Produit 3',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg',
        'price' => 50.00 // Example price
    ],
    [
        'index' => 3,
        'title' => 'Produit 4',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg',
        'price' => 30.00 // Example price
    ],
    [
        'index' => 5,
        'title' => 'Produit 5',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg',
        'price' => 26.00 // Example price
    ],
    [
        'index' => 6,
        'title' => 'Produit 6',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg',
        'price' => 200.00 // Example price
    ], [
        'index' => 7,
        'title' => 'Produit 7',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg',
        'price' => 123.00 // Example price
    ], [
        'index' => 8,
        'title' => 'Produit 8',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg',
        'price' => 900.00 // Example price
    ], [
        'index' => 9,
        'title' => 'Produit 9',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg',
        'price' => 6.12 // Example price
    ], [
        'index' => 10,
        'title' => 'Produit 3',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg',
        'price' => 3.12 // Example price
    ]
];

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = $products;
}


$products = $_SESSION['products'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Produits</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <a href="cart.php" class="btn btn-info mb-3">View Cart</a> <!-- Button to view the cart -->
        <a href="admin_login.php" class="btn btn-secondary mb-3">Admin Login</a> <!-- Button to go to admin login -->
        <div class="row">
            <?php foreach ($products as $index => $product) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="details.php?index=<?php echo $index; ?>">
                            <img src="<?php echo $product['image']; ?>" class="card-img-top" style="width:100px; height:auto;" alt="<?php echo $product['title']; ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['title']; ?></h5>
                            <p class="card-text"><?php echo $product['description']; ?></p>
                            <p class="card-text">Prix: <?php echo $product['price']; ?> €</p> <!-- Displaying the price -->
                            <a href="cart.php?action=add&index=<?php echo $index; ?>" class="btn btn-primary">Ajouter au panier</a>
                            <a href="edit.php?index=<?php echo $index; ?>" class="btn btn-secondary">Edit</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>