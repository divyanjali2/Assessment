<?php
// include/DB.php


// Book.php
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
        $query = "SELECT COUNT(*) AS total_available_books FROM books WHERE availability = 'available'";
        $result = $this->db->getConnection()->query($query);
        $row = $result->fetch_assoc();
        return $row['available_books'];
    }

    public function getReturnedBooks()
    {
        $query = "SELECT COUNT(*) AS total_available_books FROM books WHERE availability = 'available'
        '
        '";
        $result = $this->db->getConnection()->query($query);
        $row = $result->fetch_assoc();
        return $row['returned_books'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Linking CSS file -->
</head>

<body>
    <h1>Library Dashboard</h1><br>
    <div class="container">
    
        <?php
        include 'includes/db.php';
        $book = new Book();
        ?>
        <div class="dashboard">
            <div class="card">
                <h2><a href="viewbook.php">Total Books</h2>
                <p><div class="pa">
                    <?php echo $book->getTotalBooks(); ?>
             </div>   </p>
            </div>
            <div class="space"></div> <!-- Space between cards -->
            <div class="card">
                <h2><a href="viewbook.php">Available Books</h2>

            </div>
            <div class="space"></div> <!-- Space between cards -->

            <div class="space"></div> <!-- Space between cards -->
            <div class="card">
                <h2><a href="add_book.php">Manage Books</h2>

            </div>
        </div>
    </div>
</body>

</html>