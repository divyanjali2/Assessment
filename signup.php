<?php
session_start();

include './includes/db.php';

$db = new DB();

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $db->getConnection()->prepare($sql);

    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        $message = "User registered successfully!";
        header("Location: ./login/login.php");
        exit;
    } else {
    
        $message = "Error: " . $sql . "<br>" . $stmt->error;
    }

    
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>


<div class="container">

        <h2>Sign Up</h2>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Sign Up">
           
        </form>
        <div class="message"><?php echo $message; ?></div>
    </div>
    
</body>

</html>