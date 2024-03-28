<?php
include '../includes/db.php';

$db = new DB();

if (isset($_POST['submit'])) {
    // Retrieve form data
    $bookName = $_POST['book_name'];
    $category = $_POST['category'];
    $isbn = $_POST['isbn'];
    $author = $_POST['author'];
    
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $availability = $_POST['availability'];
    $borrowed = $_POST['borrowed'];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO `books` (`book_name`, `category`, `isbn`, `author`, `publisher`, `price`, `quantity`, `location`, `availability`,'borrowed') 
            VALUES ('$bookName', '$category', '$isbn', '$author', '$publisher', '$price', '$quantity', '$location', '$availability','$borrowed')";
    $result = $db->query($sql);

    // Check if the query was successful
    if ($result) {
       // echo "Book added successfully.";
       header("location:display.php");
    } else {
        echo "Error: " . $db->getConnection()->error;
    }
}
?>











<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Book Title</label>
                <input type="name" class="form-control" placeholder="Enter email" name="book_name">
                <label>category</label>
                <input type="text" class="form-control" placeholder="Enter email" name="category">
                <label>ISBN</label>
                <input type="number" class="form-control" placeholder="Enter email" name="isbn">
                <label>Author</label>
                <input type="text" class="form-control" placeholder="Enter email" name="author">

                
                <label>Price</label>
                <input type="text" class="form-control" placeholder="Enter email" name="price">
                <label>quantity</label>
                <input type="number" class="form-control" placeholder="Enter email" name="quantity">
                <label>Location</label>
                <input type="text" class="form-control" placeholder="Enter email" name="location">
                <label>Availability</label>
                <input type="text" class="form-control" placeholder="Enter email" name="availability">
                <label>Borrowed</label>
                <input type="text" class="form-control" placeholder="Enter email" name="borrowed">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>




















    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>