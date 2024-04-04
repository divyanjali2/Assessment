<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-NcVOiQHymFw1fSEMWJZq2QRtmLZBM05FbQvfPYuN+d98F2fROivwJJVXKBR4AqV6" crossorigin="anonymous">
    <title>Library Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<?php include 'includes/navbar.php'; ?>
<h1>Library Dashboard</h1>

    <?php
    include 'includes/db.php';
    include 'classes/Book.php';
    
    $book = new Book();
    ?>
    <div class="dashboard">
        <div class="card">
            <h2><a href="view_books.php">Total Books</a></h2>
            <p>
            <div class="pa">
                <?php echo $book->getTotalBooks(); ?>
            </div>
            </p>
        </div>
        <div class="space"></div>
        <div class="card">
            <h2><a href="available.php">Available Books</a></h2>
            <p>
            <div class="pa">
                <?php echo $book->getAvailableBooks(); ?>
            </div>
            </p>
        </div>
        <div class="space"></div>
        <div class="card">
            <h2><a href="borrowed.php">Borrowed Books</a></h2>
            <p>
            <div class="pa">
                <?php echo $book->getBorrowedBooks(); ?>
            </div>
            </p>
        </div>
        <div class="space"></div>

        <div class="card">
            <h2><a href=".\books\display.php">Manage Books</a></h2>
        </div>
    </div>

</body>

</html>