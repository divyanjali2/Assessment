<?php
include '../includes/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new DB();
    $conn = $db->getConnection();

    // SQL injection prevention
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $db->query($query);

    if ($result && $result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: ../dashboard.php");
    } else {
        echo "Invalid username or password";
    }
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="..\style.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
