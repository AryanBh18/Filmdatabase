<?php 
// sql to delete a record
if (isset($_GET['id']) && !empty($_GET['id'])) {
  require_once 'db-con.php';
  $id = $_GET['id'];
  $sql = "DELETE FROM films WHERE id = $id";


  
  if ($con->query($sql) === TRUE){
    $_SESSION['message'] = "Movie has been deleted!";
    header("location:index.php");
  } else {
  echo "Error deleting record: " . $con->error;
  }
}
include('index.php');

?>