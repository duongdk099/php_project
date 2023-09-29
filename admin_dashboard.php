<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin_login.php');
    exit;
}

// Initialize products from session
$products = isset($_SESSION['products']) ? $_SESSION['products'] : [];

// Check for actions
$action = isset($_GET['action']) ? $_GET['action'] : '';
$index = isset($_GET['index']) ? $_GET['index'] : null;

if ($action === 'delete' && array_key_exists($index, $products)) {
    unset($_SESSION['products'][$index]);
    header('Location: admin_dashboard.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Admin Dashboard</h2>
    <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
    <a href="add_product.php" class="btn btn-success mb-3">Add Product</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price (€)</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $index => $product) : ?>
            <tr>
                <th scope="row"><?php echo $index; ?></th>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td>
                    <a href="edit_product.php?index=<?php echo $index; ?>" class="btn btn-secondary btn-sm">Edit</a>
                    <a href="admin_dashboard.php?action=delete&index=<?php echo $index; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
