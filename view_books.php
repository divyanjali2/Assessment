<?php
include './includes/db.php';
include 'includes/action.php';
include 'includes/navbar.php';

$db = new DB();
$conn = $db->getConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>View Books</title>
    <link rel="stylesheet" href="assets/css/style.css">


</head>
<body>
    <div class="available">
       
<h1>Total Books</h1>
        <table class="table">
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

                </tr>
            </thead>
            <tbody>

                <?php

                $number = 1;

                $sql = "SELECT * FROM `books`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
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


                        echo ' <tr>
                        <th scope="row"> ' . $number . ' </th>
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