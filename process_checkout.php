<?php
session_start();

// Check if cart is set in session
if (!isset($_SESSION['cart'])) {
    die("Cart not found");
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    
    // Set delivery address in session
    $_SESSION['delivery_address'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'address' => $address,
        'city' => $city,
        'zip' => $zip
    ];
    
    // Set order details in session
    $_SESSION['order_details'] = $_SESSION['cart'];
    
    // Redirect to thank you page
    header("Location: thank_you.php");
    exit;
} else {
    // Redirect to checkout page if form data is not received
    header("Location: checkout.php");
    exit;
}
