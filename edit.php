<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['products'])) {
    // Initialize products in session if not already set
    $_SESSION['products'] = [
        // ... your products array ...
    ];
}

$index = isset($_GET['index']) ? $_GET['index'] : null;
if ($index === null || !isset($_SESSION['products'][$index])) {
    die("Invalid product index");
}

$product = $_SESSION['products'][$index];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $price = $_POST['price']; // Handling price

    // Update the product details in the session
    $_SESSION['products'][$index]['title'] = $title;
    $_SESSION['products'][$index]['description'] = $description;
    $_SESSION['products'][$index]['image'] = $image;
    $_SESSION['products'][$index]['price'] = $price; // Updating price in session

    // Redirect to the details page of the product after updating the product details
    header("Location: details.php?index=$index");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Edit <?php echo $product['title']; ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <form method="POST" action="edit.php?index=<?php echo $index; ?>">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $product['title']; ?>" />
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description"><?php echo $product['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="text" class="form-control" id="image" name="image" value="<?php echo $product['image']; ?>" />
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" /> <!-- Price input field -->
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="index.php" class="btn btn-secondary">Back to Products</a> <!-- Button to go back to index.php -->

        </form>
    </div>
</body>

</html>