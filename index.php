<?php
$connect = mysqli_connect("localhost", "root", "", "librarymgtsystem");

session_start();
if (isset($_SESSION["username"])) {
     header("location:dashboard.php");
}
if (isset($_POST["register"])) {
     if (empty($_POST["username"]) && empty($_POST["password"])) {
          echo '<script>alert("Both Fields are required")</script>';
     } else {
          $username = mysqli_real_escape_string($connect, $_POST["username"]);
          $password = mysqli_real_escape_string($connect, $_POST["password"]);
          $password = md5($password);
          $query = "INSERT INTO users (username, password) VALUES('$username', '$password')";
          if (mysqli_query($connect, $query)) {
               echo '<script>alert("Registration Done")</script>';
          }
     }
}
if (isset($_POST["login"])) {
     if (empty($_POST["username"]) && empty($_POST["password"])) {
          echo '<script>alert("Both Fields are required")</script>';
     } else {
          $username = mysqli_real_escape_string($connect, $_POST["username"]);
          $password = mysqli_real_escape_string($connect, $_POST["password"]);
          $password = md5($password);
          $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
          $result = mysqli_query($connect, $query);
          if (mysqli_num_rows($result) > 0) {
               $_SESSION['username'] = $username;
               header("location:dashboard.php");
          } else {
               echo '<script>alert("Wrong User Details")</script>';
          }
     }
}
?>
<!DOCTYPE html>
<html>

<head>
     <title>Library Managment System</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
     <br /><br />
     <h1 align="center">Library Managment System</h1>
     <div class="container" style="width:500px;">
         <br/>
          <?php
          if (isset($_GET["action"]) == "login") {
               ?>
               <h1 align="center">Login</h1>
               <br />
               <form method="post">
                    <label>Enter Username</label>
                    <input type="text" name="username" class="form-control" />
                    <br />
                    <label>Enter Password</label>
                    <input type="password" name="password" class="form-control" />
                    <br />
                    <input type="submit" name="login" value="Login" class="btn btn-info" />
                    <br />
                    <p align="center"><a href="index.php">Register</a></p>
               </form>
          <?php
          } else {
               ?>
               <h1 align="center">Register</h1>
               <br />
               <form method="post">
                    <label>Enter Username</label>
                    <input type="text" name="username" class="form-control" />
                    <br />
                    <label>Enter Password</label>
                    <input type="password" name="password" class="form-control" />
                    <br />
                    <input type="submit" name="register" value="Register" class="btn btn-info" />
                    <br />
                    <p align="center"><a href="index.php?action=login">Login</a></p>
               </form>
          <?php
          }
          ?>
     </div>
</body>

</html>