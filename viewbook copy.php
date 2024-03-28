<?php
// Include necessary files and classes
include 'includes/db.php';

// Initialize DB object
$db = new DB();

// Get all books from the database
$query = "SELECT * FROM books";
$books = $db->fetchAll($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
<div class="container">
    <button class="btn btn-primary my-5"><a href="inventory.php" class="text-light">
            Back To Inventory</a></button>
        <button class="btn btn-primary my-5"><a href="batchflockrecord.php" class="text-light">
            Add Flock</a></button>
            <button class="btn btn-primary my-5"><a href="mortality.php" class="text-light">
            Mortality</a></button>
            

            <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">LotNo#</th>
      <th scope="col">No.of Hens</th>
      <th scope="col">Unit Weight</th>
      <th scope="col">Total Weight</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>


  <?php
    $sql="SELECT * FROM batchflockrecord";
    $result=mysqli_query($con,$sql);
    $number=1;
   if($result){
        while($row=mysqli_fetch_assoc($result)){
          $ID =$row['ID'];
          $LotNo =$row['LotNo'];
          $NumberofHens=$row['NoofHens'];
          $UnitWeight=$row['UnitWeight'];
          $TotalWeight=$row['TotalWeight'];

        echo '<tr>
          
          <th scope="row"> '. $number.' </th>
          <td> '.$LotNo.' </td>
          <td> '.$NumberofHens.' </td>
          <td> '.$UnitWeight.' </td>
          <td> '.$TotalWeight.' </td>
          <td>
          <button class="btn btn-primary"><a href="update.php? updateid='.$ID.'" class="text-light">Update</a></button>
    <button class="btn btn-danger"><a href="delete.php? deleteLot='.$ID.'" class="text-light">Delete</a></button>
 </td>
    </tr>';
     $number++;

  

}
   }
  
   ?>
    
 
  </tbody>
</table>

</div>
</body>    
</html>