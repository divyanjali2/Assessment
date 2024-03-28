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
                <h2><a href="view_books.php">Total Books</h2>
                <p>
                <div class="pa">
                    <?php echo $book->getTotalBooks(); ?>
                </div>
                </p>
            </div>
            <div class="space"></div> <!-- Space between cards -->
            <div class="card">
                <h2><a href="available.php">Available Books</h2>
                <?php echo $book->getAvailableBooks(); ?>

            </div>
           
            <div class="space"></div> <!-- Space between cards -->
            <div class="card">
                <h2><a href="view_books.php">Borrowed Books</h2>
                <?php echo $book->getBorrowedBooks(); ?>

            </div>


            <div class="space"></div> <!-- Space between cards -->

            <div class="space"></div> <!-- Space between cards -->
            <div class="card">
                <h2><a href=".\books\display.php">Manage Books</h2>

            </div>
        </div>
    </div>
</body>

</html>