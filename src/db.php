<?php
// db.php: Database connection file
class Database {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('webshop.db');
    }

    public function getConnection() {
        return $this->db;
    }

    public function closeConnection() {
        $this->db->close();
    }
}
?>
