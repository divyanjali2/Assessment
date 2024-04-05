<?php
include '../includes/db.php';
include './b_nav.php';

session_start();  
if(!isset($_SESSION["username"]))  
{  
     header("location:../index.php?action=login");  
} 

$db = new DB();//creates an instance of the DB class,
$conn = $db->getConnection();//retrieves the database connection object from the DB class using the getConnection() method.


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Display Records</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="available">
   
       
    

        <h1>Book Details</h1>
        <table class="table">
        <button class="button button1 my-2"><a href="book.php" class="text-light" >Add New Book</a></button><br>

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Author</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Location</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Borrowed</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $number = 1;

                $sql = "SELECT * FROM `books`";
                $result = mysqli_query($conn, $sql);//executes the SQL query using the database connection ($conn) and stores the result in $result
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
/*Inside the if ($result) block, it loops through each row of the result set using while
 ($row = mysqli_fetch_assoc($result)) { ... }.
It extracts the values of each column from the current row into separate variables like $id, $bookName, $category, etc. */

                        $id = $row['id'];
                        $bookName = $row['book_name'];
                        $category = $row['category'];
                        $isbn = $row['isbn'];
                        $author = $row['author'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $location = $row['location'];
                        $availability = $row['availability'];
                        $borrowed = $row['borrowed'];

/*The sequential number is displayed in the first column (<th scope="row">) using $number.
The book information such as name, category, ISBN, author, price, quantity, location, availability, 
and borrowed status are displayed in subsequent columns (<td>). */
                        echo ' <tr>
                    <th scope="row">' . $number . '</th>
                      <td>' . $bookName . '</td>
                      <td>' . $category . '</td>
                      <td>' . $isbn . '</td>
                      <td>' . $author . '</td>
                      <td>' . $price . '</td>
                      <td>' . $quantity . '</td>
                      <td>' . $location . '</td>
                      <td>' . $availability . '</td>
                      <td>' . $borrowed . '</td>

                      <td>
                      <button class="btn btn-primary my-1"><a href="update.php?
                      updateid=' . $id . '"class="text-light">Update</a></button>

                      <button class = "btn btn-danger"><a href="delete.php? 
                      deleteid=' . $id . '" class="text-light">Delete</a></button>
                      </td>
                </tr>';
                        $number++;

                    }
                }
                ?>

            </tbody>
    </div>
    </table>
</body>

</html>