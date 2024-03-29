<?php
include '../includes/DB.php';

$db = new DB();
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