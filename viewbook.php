<?php
// Include necessary files and classes
include 'includes/db.php';

// Initialize DB object
$db = new DB();

// Get all books from the database
$query = "SELECT * FROM books";
$books = $db->fetchAll($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h1>View Books</h1>
    <div class="container">
        <div class="sidebar">
            <h2>Manage Books</h2>
            <ul>
                <li><a href="add_book.php">Add Book</a></li>
                <li><a href="viewbook.php">View Book</a></li>
            </ul>
        </div>

        <table>
            <tr>
                <th>Book Name</th>
                <th>Category</th>
                <th>ISBN</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Location</th>
                <th>Availability</th>
            </tr>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td>
                        <?php echo $book['book_name']; ?>
                    </td>
                    <td>
                        <?php echo $book['category']; ?>
                    </td>
                    <td>
                        <?php echo $book['isbn']; ?>
                    </td>
                    <td>
                        <?php echo $book['author']; ?>
                    </td>
                    <td>
                        <?php echo $book['publisher']; ?>
                    </td>
                    <td>
                        <?php echo $book['price']; ?>
                    </td>
                    <td>
                        <?php echo $book['quantity']; ?>
                    </td>
                    <td>
                        <?php echo $book['location']; ?>
                    </td>
                    <td>
                        <?php echo $book['availability']; ?>
                    </td>
                    <button class="btn btn-primary"><a href="update.php? updateid='.$ID.'"
                            class="text-light">Update</a></button>
                    <button class="btn btn-danger"><a href="delete.php? deleteLot='.$ID.'"
                            class="text-light">Delete</a></button>
                </tr>
            <?php endforeach; ?>
        </table>
</body>

</html>