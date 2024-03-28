<?php
// Include necessary files and classes
include 'includes/db.php';
// Initialize DB object
$db = new DB();

// Check if form is submitted to add a book
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_book'])) {
    // Get form data
    $bookName = $_POST['book_name'];
    $category = $_POST['category'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $availability = $_POST['availability'];

    // Insert book into database
    $query = "INSERT INTO books (book_name, category, isbn, author, publisher, price, quantity, location, availability) 
              VALUES ('$bookName', '$category', '$isbn', '$author', '$publisher', '$price', '$quantity', '$location', '$availability')";
    $db->query($query);

    // Redirect to viewbook.php
    header("Location: viewbook.php");
    exit;
}

// Get all books from the database
$query = "SELECT * FROM books";
$books = $db->fetchAll($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h2>Manage Books</h2>
            <ul>
                <li><a href="#add_book">Add Book</a></li>
                <li><a href="viewbook.php">View Book</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>Library Management System</h1>

            <div id="add_book" class="section">
                <h2>Add Book</h2>
                <form method="post" action="">
                    <label for="book_name">Book Name:</label><br>
                    <input type="text" id="book_name" name="book_name" required><br>
                    <label for="category">Category:</label><br>
                    <input type="text" id="category" name="category" required><br>
                    <label for="isbn">ISBN:</label><br>
                    <input type="text" id="isbn" name="isbn" required><br>
                    <label for="author">Author:</label><br>
                    <input type="text" id="author" name="author" required><br>
                    <label for="publisher">Publisher:</label><br>
                    <input type="text" id="publisher" name="publisher" required><br>
                    <label for="price">Price:</label><br>
                    <input type="text" id="price" name="price" required><br>
                    <label for="quantity">Quantity:</label><br>
                    <input type="text" id="quantity" name="quantity" required><br>
                    <label for="location">Location:</label><br>
                    <input type="text" id="location" name="location" required><br>
                    <label for="availability">Availability:</label><br>
                    <input type="text" id="availability" name="availability" required><br><br>
                    <input type="submit" name="add_book" value="Add Book">
                </form>
            </div>




        </div>
    </div>
</body>

</html>