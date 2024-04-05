<?php



class Book
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getTotalBooks()
    {
        $query = "SELECT COUNT(*) as total_books FROM books";
        $result = $this->db->getConnection()->query($query);
        $row = $result->fetch_assoc();
        return $row['total_books'];
    }

    public function getAvailableBooks()
    {
        $query = "SELECT COUNT(*) AS available_books FROM books WHERE availability = 'available'";
        $result = $this->db->getConnection()->query($query);
        $row = $result->fetch_assoc();
        return $row['available_books'];
    }

    public function getBorrowedBooks()
    {
        $query = "SELECT COUNT(*) AS borrowed_books FROM books WHERE borrowed = 'borrowed'";
        $result = $this->db->getConnection()->query($query);
        $row = $result->fetch_assoc();
        return $row['borrowed_books'];
    }
}
?>