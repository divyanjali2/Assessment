<?php
include '../includes/db.php';
include './b_nav.php';

$db = new DB();
//retrieves the database connection object from the DB class using the getConnection() method.
$conn = $db->getConnection();
$db = new DB();

//This retrieves the value of the updateid parameter from the URL query string. Presumably, 
//this ID corresponds to the book that needs to be updated
$id = $_GET['updateid'];
$sql = "SELECT * FROM `books` WHERE id=$id";

// executes an SQL query ($sql) on the database connection ($conn) and stores the result in $result
$result=mysqli_query($conn,$sql);
//fetches a single row from the result set returned by the SQL query and stores it in an associative array $row
$row=mysqli_fetch_assoc($result);
$bookName = $row['book_name'];
$category = $row['category'];
$isbn = $row['isbn'];
$author = $row['author'];
$price = $row['price'];
$quantity = $row['quantity'];
$location = $row['location'];
$availability = $row['availability'];
$borrowed = $row['borrowed'];



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

$sql = "UPDATE `books` SET `id`='$id', `book_name`='$bookName', `category`='$category', `isbn`='$isbn', `author`='$author', `price`='$price', `quantity`='$quantity', `location`='$location', `availability`='$availability', `borrowed`='$borrowed' WHERE id=$id";


//executing a SQL query using the $sql string and storing the result in the $result
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Update Records</title>
<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
   
<div class="container-xl">
<div class="row">
    <h1>Update Records</h1>
        <form method="post">
            <div class="form-group">

            <div class="col">
                <label>Book Title</label>
                <input type="string" class="form-control" name="book_name"
                 value =<?php echo $bookName;?>></div>
            <div class="col">
                <label>Category</label>
                <input type="text" class="form-control" name="category"
                value =<?php echo $category;?>> </div>
                <div class="col">
                <label>ISBN</label>
                <input type="number" class="form-control" name="isbn"
                value =<?php echo $isbn;?>> </div>
                <div class="col">
                <label>Author</label>
                <input type="string" class=" form-control" name="author"
                value =<?php echo $author;?>> </div>
                <div class="col">
                <label>Price</label>
                <input type="text" class="form-control" name="price"
                value =<?php echo  $price;?>> </div>
                <div class="col">
                <label>Quantity</label>
                <input type="number" class="form-control" name="quantity"
                value =<?php echo $quantity;?>> </div>
                <div class="col">
                <label>Location</label>
                <input type="text" class="form-control" name="location"
                value =<?php echo $location;?>> </div>
                <div class="col">
                <label>Availability</label>
                <select class="form-select" name="availability" value =<?php echo $availability;?>>
               
    <option value="Available">Available</option>
    <option value="Not Available">Not Available</option>
</select> <br></div>


<div class="col">
                <label>Select Borrowed Status</label>
<select class="form-select" name="borrowed" value =<?php echo $borrowed;?>>
    <option value="Borrowed">Borrowed</option>
    <option value="Having">Having</option>
</select></div>
                <button type="submit" class="btn btn-primary my-5" name="submit">Update</button>
        </form>
    </div>
</div>
</body>
</html>