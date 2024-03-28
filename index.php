<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie list</title>
  <link rel="Stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container my-5">
<h2>List of movies</h2>

<a class="btn btn-primary" href="/Movie-website-V2/create.php"   role="button">New movies</a>
<br>

<table class="table">
<thead>
  <tr>
    <th>titel</th>
    <th>genre</th>
    <th>regisseur</th>
    <th>releasejaar</th>
    <th>beschrijving</th>
    <th>beoordeling</th>
    <th>studio</th>

</tr>
</thead>
<tbody>
  <?php

require_once 'db-con.php';
require_once 'function.php';
$result= display_data()

 ?>
 <tr>
<?php 
while($row = mysqli_fetch_assoc($result)){
  ?>
  <td><?php echo $row ['titel'];?></td>
  <td><?php echo $row ['genre'];?></td>
  <td><?php echo $row ['regisseur'];?></td>
  <td><?php echo $row ['releasejaar'];?></td>
  <td><?php echo $row ['beschrijving'];?></td>
  <td><?php echo $row ['beoordeling'];?></td>
  <td><?php echo $row ['studio'];?></td>
  <td><a href="edit.php?id=<?php echo $row['id']?>"class='btn btn-danger btn-sm'>Edit</a></td>
  <td><a href="delete.php?id=<?php echo $row['id']?>"class='btn btn-danger btn-sm' >Delete</a></td>
</tr>
<?php
 }
?>








</table>
</div>






</body>
</html>