<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cart</title>

    <!-- Link to Bootstrap CSS -->
    <link href="assets/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body id="top">
<div class="container">
    <h1>Your Cart</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Album Image</th>
            <th>Album Name</th>
            <th>Price</th>
            <th>Remove</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $key => $item) {
                echo '<tr>';
                echo '<td><img src="assets/images/' . $item['image'] . '" alt="' . $item['name'] . '" width="100"></td>';
                echo '<td>' . $item['name'] . '</td>';
                echo '<td>$' . number_format($item['price'], 2) . '</td>';
                echo '<td><a href="remove_from_cart.php?key=' . $key . '" class="btn btn-danger">Remove</a></td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="4">Your cart is empty.</td></tr>';
        }
        ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-primary">Continue Shopping</a>
</div>
</body>
</html>
