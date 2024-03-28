<?php

require_once 'db-con.php';
function display_data(){
    global $con;
    $query = "SELECT * FROM films";
    $result = mysqli_query($con,$query);
    return $result;
}
?>