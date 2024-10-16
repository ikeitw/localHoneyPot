<?php
// Include database connection
require_once 'db.php';

// Create a new database instance
$db = new Database();
$connection = $db->getConnection();
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webshop</title>

    <!-- Link to Bootstrap CSS -->
    <link href="assets/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!-- Link to Screen CSS -->
    <link href="assets/screen.css" rel="stylesheet" type="text/css"/>

</head>
<body id="top">
<div class="container">
    <h1 class="cover-heading">Welcome to the Webshop</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Album Image</th>
            <th>Album Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Fetch all items from the database
        $items = $connection->query('SELECT * FROM items');
        while ($row = $items->fetchArray(SQLITE3_ASSOC)) {
            echo '<tr>';
            echo '<td><img src="assets/images/' . $row['image'] . '" alt="' . $row['name'] . '" width="100"></td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>$' . number_format($row['price'], 2) . '</td>';
            echo '<td><a href="cart.php?id=' . $row['id'] . '" class="btn btn-primary">Add to Cart</a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Optionally include Bootstrap's JavaScript dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$db->closeConnection();
?>
