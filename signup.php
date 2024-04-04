<?php
session_start();//This starts a new session or resumes the existing session.

include './includes/db.php';

$db = new DB();

$message = '';//This initializes an empty variable $message to store any messages that might occur during the registration process.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
//It hashes the password using the password_hash() function before storing it in the database. 
//This enhances security by encrypting the password.

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $db->getConnection()->prepare($sql);

$stmt->bind_param("ss", $username, $password);//It binds the username and hashed password as parameters to the prepared statement.


    if ($stmt->execute()) {
        $message = "User registered successfully!";
        header("Location: ./index.php");
        exit;
    } else {
    
        $message = "Error: " . $sql . "<br>" . $stmt->error;
    }

    
    $stmt->close();
}

/*The code checks if the request method is POST, indicating that the registration form has been submitted.

If it's a POST request, it retrieves the username from the submitted form data.

It hashes the password using the password_hash() function before storing it in the database. 
This enhances security by encrypting the password.

It prepares an SQL query to insert the username and hashed password into the users table.

It binds the username and hashed password as parameters to the prepared statement.

If the execution of the prepared statement is successful ($stmt->execute() returns true), 
it sets a success message, redirects the user to the login page, and terminates the script execution.

If there's an error during the execution of the prepared statement, it sets an error message 
containing the SQL query and the error message provided by $stmt->error.

Finally, it closes the prepared statement. */
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