<?php
session_start();
require_once 'db.php';

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Get the item ID from the URL
$id = $_GET['id'] ?? null;

if ($id) {
    $db = new Database();
    $connection = $db->getConnection();

    // Fetch the item details from the database
    $stmt = $connection->prepare('SELECT * FROM items WHERE id = :id');
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);

    // Add item to cart
    if ($result) {
        $_SESSION['cart'][] = $result;
        echo "Item added to cart!";
    } else {
        echo "Item not found!";
    }

    $db->closeConnection();
}

// Redirect to the cart view page
header('Location: cart_view.php');
?>
