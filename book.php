<?php


//session_start();  

include 'includes/navbar.php';


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add new record</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<div class="container-xl">
<div class="row">
    <h1>Add New Book</h1>
        <form method="post">
            <div class="form-group">
                
            <div class="col">
                <label>Book Title</label>
                <input type="text" class="form-control " placeholder="Enter book title" name="book_name">
            </div>
            <div class="col">
                <label>Category</label>
                <input type="text" class="form-control" placeholder="Enter book category" name="category">
            </div>
            <div class="col">
                <label>ISBN</label>
                <input type="number" class="form-control" placeholder="Enter ISBN" name="isbn">
            </div>
            <div class="col">
                <label>Author</label>
                <input type="text" class="form-control" placeholder="Enter author name" name="author">
            </div>
            <div class="col">
                <label>Price</label>
                <input type="text" class="form-control" placeholder="Enter price" name="price">
            </div>
            <div class="col">
                <label>Quantity</label>
                <input type="number" class="form-control" placeholder="Enter available books amount" name="quantity">
            </div>
            <div class="col">
                <label>Location</label>
                <input type="text" class="form-control" placeholder="Enter location" name="location">
            </div>
            <div class="col">
                <label>Availability</label>
                    <select class="form-select" name="availability" value =<?php echo $availability;?>>
                        <option value="Available">Available</option>
                        <option value="Not Available">Not Available</option>
                    </select> <br></div>
            <div class="col">
                <label>Select Borrowed Status</label>
                    <select class="form-select" name="borrowed">
                        <option value="Borrowed">Borrowed</option>
                        <option value="Having">Having</option>
                    </select> <br></div>
                    <div class="col">
                <button type="submit" class="btn btn-primary my-3" name="submit">Submit</button></div>
        </form>
    </div>
</body>
</html>