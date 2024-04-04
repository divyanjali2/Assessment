<?php
include '../includes/db.php';

//creates an instance of the DB class,
$db = new DB();

/*This block checks if the form has been submitted (presumably via a POST request) by checking 
if the 'submit' key is set in the $_POST superglobal.*/
if (isset($_POST['submit'])) {
    
    $bookName = $_POST['book_name'];
    $category = $_POST['category'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $availability = $_POST['availability'];
    $borrowed = $_POST['borrowed'];
/**The script retrieves form data submitted via POST and assigns them to variables. 
     * These variables likely correspond to the fields in the books table */
    
    
    $sql = "INSERT INTO `books` (`book_name`, `category`, `isbn`, `author`, `price`, `quantity`, `location`, `availability`, `borrowed`) 
    VALUES ('$bookName', '$category', '$isbn', '$author', '$price', '$quantity', '$location', '$availability', '$borrowed')";
/* executes the SQL query using the query() method of the $db object, which is an instance of the DB class. 
It expects the query to return a result.*/ 
    $result = $db->query($sql);

    
    if ($result) {
      header("location:display.php");
    } else {
        echo "Error: " . $db->getConnection()->error;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Add new record</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group my-3">
                <label>Book Title</label>
                <input type="text" class="form-control " placeholder="Enter book title" name="book_name">
                <label>Category</label>
                <input type="text" class="form-control" placeholder="Enter book category" name="category">
                <label>ISBN</label>
                <input type="number" class="form-control" placeholder="Enter ISBN" name="isbn">
                <label>Author</label>
                <input type="text" class="form-control" placeholder="Enter author name" name="author">
                <label>Price</label>
                <input type="text" class="form-control" placeholder="Enter price" name="price">
                <label>Quantity</label>
                <input type="number" class="form-control" placeholder="Enter available books amount" name="quantity">
                <label>Location</label>
                <input type="text" class="form-control" placeholder="Enter location" name="location">
                <label>Availability</label>
                <input type="text" class="form-control" placeholder="Enter book availability" name="availability">
                <label>Borrowed</label>
                <input type="text" class="form-control" placeholder="Borrowed or Having" name="borrowed">
                <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>