<?php

class DB {
    //meaning they can only be accessed within the DB class. 
    //This is important for encapsulation, as it hides the internal details of the database 
   // (such as the host, username, password, and database name) from external code.
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'librarymgtsystem';
    public $conn;

//special method that is automatically called when an object of the class is created (instantiated
//constructor method
    public function __construct() {
      //  It establishes a connection to the database server using the mysqli class, 
       // passing in the host, username, password, and database name.
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

      
        
    }
  //  This method allows external code to retrieve the database connection object $conn.
    public function getConnection() {
        return $this->conn;
    }
    //This method accepts a SQL query as a parameter, executes the query using the database connection, 
    //and returns the result.
    public function query($sql) {
        return $this->conn->query($sql);
    }
  
    // fetches all rows from the result set, and returns them as an array of associative arrays.
    public function fetchAll($query) {
        $result = $this->conn->query($query);
        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
//that is automatically called when an object is destroyed or the script ends. In this case, it doesn't contain any code.
    public function __destruct() {
    
    }
    
}
?>
