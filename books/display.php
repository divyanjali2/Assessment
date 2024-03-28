<?php
include '../includes/DB.php';

// Create an instance of the DB class
$db = new DB();

// Get the database connection object
$conn = $db->getConnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="..\dashboard.php" class="text-light">Back to Dashboard</button>
        <button class="btn btn-primary my-5"><a href="book.php" class="text-light">Add New Book</button>
        
        </button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">category</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Location</th>
                    <th scope="col">Availability</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $sql = "SELECT * FROM `books`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $bookName = $row['book_name'];
                        $category = $row['category'];
                        $isbn = $row['isbn'];
                        $author = $row['author'];
                        $publisher = $row['publisher'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $location = $row['location'];
                        $availability = $row['availability'];

                        echo ' <tr>
                      <th scope="row">' . $id . '</th>
                      <td>' . $bookName . '</td>
                      <td>' . $category . '</td>
                      <td>' . $isbn . '</td>
                      <td>' . $author . '</td>
                      <td>' . $publisher . '</td>
                      <td>' . $price . '</td>
                      <td>' . $quantity . '</td>
                      <td>' . $location . '</td>
                      <td>' . $availability . '</td>
                      <td>
                      <button class="btn btn-primary"><a href="update.php?
                      updateid='.$id.'"class="text-light">Update</a></button>

                      <button class = "btn btn-danger"><a href="delete.php? 
                      deleteid='.$id.'" class="text-light">Delete</a></button>
                      </td>
                  </tr>';

                    }
                }





                ?>





            </tbody>
    </div>
    </table>
</body>

</html>