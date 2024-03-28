<?php
include '../includes/DB.php';

// Create an instance of the DB class
$db = new DB();

// Get the database connection object
$conn = $db->getConnection();

if (isset ($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql = "delete  FROM `books` where id =$id";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("location:display.php");}
                    else{
                        die(mysqli_error($conn));
                    }
                }
?>