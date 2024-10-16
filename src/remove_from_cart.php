<?php
session_start();

// Get the item key from the URL
$key = $_GET['key'] ?? null;

if ($key !== null && isset($_SESSION['cart'][$key])) {
    // Remove the item from the cart
    unset($_SESSION['cart'][$key]);
}

// Redirect back to the cart view page
header('Location: cart_view.php');
?>
