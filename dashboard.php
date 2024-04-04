<?php


class Book
{
    protected $db;

    public function __construct()//constructor method of the class. It is automatically called when an object of the class is created
    {
        $this->db = new DB();
    }

    public function getTotalBooks()
    {
        /*This method is responsible for fetching the total number of books from the database.
         It constructs an SQL query to count the total number of records in the books table, executes the query, 
         fetches the result, and returns the total number of books. */
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-NcVOiQHymFw1fSEMWJZq2QRtmLZBM05FbQvfPYuN+d98F2fROivwJJVXKBR4AqV6" crossorigin="anonymous">

    <title>Library Dashboard</title>
    <link rel="stylesheet" href=".\assets\css\style.css">

</head>

<body>
    <nav class="navbar">
        <ul class="nav-links">
            <li><a href="view_books.php">Total Books</a></li>
            <li><a href="available.php">Available Books</a></li>
            <li><a href="borrowed.php">Borrowed Books</a></li>
            <li><a href=".\books\display.php">Manage Books</a></li>
        </ul>
        <ul class="nav-links nav-links-right">
            <li><a href=".\index.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>
    <h1>Library Dashboard</h1>

    <?php
    include 'includes/db.php';
    $book = new Book();
    ?>
    <div class="dashboard">
        <div class="card">
            <h2><a href="view_books.php">Total Books</a></h2>
            <p>
            <div class="pa">
                <?php echo $book->getTotalBooks(); ?>
            </div>
            </p>
        </div>
        <div class="space"></div>
        <div class="card">
            <h2><a href="available.php">Available Books</a></h2>
            <p>
            <div class="pa">
                <?php echo $book->getAvailableBooks(); ?>
            </div>
            </p>
        </div>
        <div class="space"></div>
        <div class="card">
            <h2><a href="borrowed.php">Borrowed Books</a></h2>
            <p>
            <div class="pa">
                <?php echo $book->getBorrowedBooks(); ?>
            </div>
            </p>
        </div>
        <div class="space"></div>

        <div class="card">
            <h2><a href=".\books\display.php">Manage Books</a></h2>
        </div>
    </div>

</body>

</html>