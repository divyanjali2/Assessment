<?php
include '../includes/db.php';


class Admin {
    private $db;

  
    

    public function login($username, $password) {
        // SQL injection prevention
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);

        // Query to fetch admin record
        $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
        $result = $this->db->query($query);

        // Check if result contains a row
        if ($result && $result->num_rows > 0) {
            return true; // Valid credentials
        } else {
            return false; // Invalid credentials
        }
    }
}
?>
