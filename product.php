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
        'image' => 'image1.jpg'
    ],
    [
        'index' => 1,
        'title' => 'Produit 2',
        'description' => 'Ceci est la description du produit 2.',
        'image' => 'image1.jpg'
    ],
    [
        'index' => 2,
        'title' => 'Produit 3',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg'
    ],
    [
        'index' => 3,
        'title' => 'Produit 4',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg'
    ],
    [
        'index' => 5,
        'title' => 'Produit 5',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg'
    ],
    [
        'index' => 6,
        'title' => 'Produit 6',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg'
    ], [
        'index' => 7,
        'title' => 'Produit 7',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg'
    ], [
        'index' => 8,
        'title' => 'Produit 8',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg'
    ], [
        'index' => 9,
        'title' => 'Produit 9',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg'
    ], [
        'index' => 10,
        'title' => 'Produit 3',
        'description' => 'Ceci est la description du produit 3.',
        'image' => 'image1.jpg'
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
