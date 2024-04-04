<?php
include './includes/db.php';

$db = new DB();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE username='$username'";

    $result = $db->query($sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];

            if (password_verify($password, $hashed_password)) {

                header("Location: ./dashboard.php");
            } else {

                echo "Invalid username or password!";
            }
        } else {

            echo "Invalid username or password!";
        }
    } else {

        echo "Error: " . $db->conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href=".\assets\css\style.css">
</head>

<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="index.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
        </form>

    </div>
</body>

</html>