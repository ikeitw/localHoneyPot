<?php
// Create or open the SQLite database
$db = new SQLite3('webshop.db');

// Create the items table if it doesn't exist
$db->exec("CREATE TABLE IF NOT EXISTS items (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    price REAL NOT NULL,
    image TEXT NOT NULL
)");

// Insert sample data into the items table
$db->exec("INSERT INTO items (name, price, image) VALUES 
    ('Album 1989', 12.99, '1989_TV.png'),
    ('Album Fearless', 9.99, 'Fearless.png'),
    ('Album Evermore', 14.99, 'Evermore.png'),
    ('Album Red', 19.99, 'Red_TV.png'),
    ('Album Folklore', 17.99, 'Folklore_TLPSS.png')
");

// Close the database connection
$db->close();

echo "Database and sample data created successfully!";
?>
