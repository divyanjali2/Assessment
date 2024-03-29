<?php
include '../includes/db.php';
$db = new DB();
$conn = $db->getConnection();
$db = new DB();
$id = $_GET['updateid'];
$sql = "SELECT * FROM `books` WHERE id=$id";


$result=mysqli_query($conn,$sql);
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

    <title>Update Records</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label>Book Title</label>
                <input type="text" class="form-control" name="book_name"
                 value =<?php echo $bookName;?>>
                <label>Category</label>
                <input type="text" class="form-control" name="category"
                value =<?php echo $category;?>>
                <label>ISBN</label>
                <input type="number" class="form-control" name="isbn"
                value =<?php echo $isbn;?>>
                <label>Author</label>
                <input type="text" class=" form-control" name="author"
                value =<?php echo $author;?>>
                <label>Price</label>
                <input type="text" class="form-control" name="price"
                value =<?php echo  $price;?>>
                <label>Quantity</label>
                <input type="number" class="form-control" name="quantity"
                value =<?php echo $quantity;?>>
                <label>Location</label>
                <input type="text" class="form-control" name="location"
                value =<?php echo $location;?>>
                <label>Availability</label>
                <input type="text" class="form-control" name="availability"
                value =<?php echo $availability;?>>
                <label>Borrowed</label>
                <input type="text" class="form-control" name="borrowed"
                value =<?php echo $borrowed;?>> 
                
                <button type="submit" class="btn btn-primary my-5" name="submit">Update</button>
        </form>
    </div>
</body>
</html>