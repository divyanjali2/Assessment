<?php
// Include necessary files and classes
include 'includes/db.php';

// Initialize DB object
$db = new DB();

// Function to update a book record
function updateBook($isbn, $newPrice)
{
    global $db;
    $query = "UPDATE books SET price = '$newPrice' WHERE isbn = '$isbn'";
    $result = $db->query($query);
    if ($result) {
        return true; // Update successful
    } else {
        return false; // Update failed
    }
}

// Function to delete a book record
function deleteBook($isbn)
{
    global $db;
    $query = "DELETE FROM books WHERE isbn = '$isbn'";
    $result = $db->query($query);
    if ($result) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }
}

// Example usage:

// Update a book record
$isbnToUpdate = '978-0060839871';
$newPrice = 10.99;
if (updateBook($isbnToUpdate, $newPrice)) {
    echo "Book with ISBN $isbnToUpdate updated successfully.";
} else {
    echo "Failed to update book with ISBN $isbnToUpdate.";
}

// Delete a book record
$isbnToDelete = '978-0060839871';
if (deleteBook($isbnToDelete)) {
    echo "Book with ISBN $isbnToDelete deleted successfully.";
} else {
    echo "Failed to delete book with ISBN $isbnToDelete.";
}
?>