<?php
// DB.php - Class for database connection
class DB {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'librarymgtsystem';
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
    public function query($sql) {
        return $this->conn->query($sql);
    }

    // Method to fetch all rows from a table
    public function fetchAll($query) {
        $result = $this->conn->query($query);
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
}
?>
