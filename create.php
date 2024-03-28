<?php
$titel = "";
$genre = ""; 	
$regisseur = ""; 	
$releasejaar= "";	
$beschrijving = "";	
$beoordeling = 	"";
$studio = "";

$errorMessage = "";
$successMessage = "";

require_once 'db-con.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $titel = $_POST["titel"];
    $genre = $_POST["genre"]; 	
    $regisseur = $_POST["regisseur"]; 	
    $releasejaar =$_POST["releasejaar"];
    $beschrijving = $_POST["beschrijving"];	
    $beoordeling = 	$_POST["beoordeling"];
    $studio = $_POST["studio"];

    do{
        if (empty($titel) || empty($genre) || empty($regisseur) || empty($releasejaar) || empty($beschrijving) || empty($beoordeling) ||empty($studio) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        // add new movie to database
$sql = "INSERT INTO films (titel,genre,regisseur,releasejaar,beschrijving,beoordeling,studio)" .   
"VALUES('$titel',' $genre','$regisseur','$releasejaar',' $beschrijving','$beoordeling','$studio')";

try{
    $result = $con->query($sql);
    if ($result){
        $successMessage = "Movie added succesfully";
        header("location: index.php");
        exit;
    }

}  catch (mysqli_sql_exception $e){
    if ($e->getCode() == 1062){ //error code for duplicate entry
        $errorMessage = "Duplicate entry: A movie with the same title already exists.";


    } else{
        $errorMessage = "Error: " . $e->getMessage();
    }
}
    } while (false);

}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>movie list</title>
    <link rel="Stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
<h2>New Movie</h2>

<?php
if (!empty($errorMessage)){
    echo"
    <div class='alert-warning-dismissible fade show' role='alert'>
    <strong>$errorMessage</strong>
    <button type= 'button' class='btn-close' data-bs-dismiss='alert' aria-label=''Close></button>
    </div>
    ";
}
?>

<form method="post">
    <div class="row mb-3">
<label class="col-sm3 col-form-label">titel</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="titel" value="<?php echo $titel; ?>">

</div>
</div>
<div class="row mb-3">
<label class="col-sm3 col-form-label">genre</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="genre" value="<?php echo $genre; ?>">

</div>
</div>

<div class="row mb-3">
<label class="col-sm3 col-form-label">regisseur</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="regisseur" value="<?php echo $regisseur; ?>">

</div>
</div>

<div class="row mb-3">
<label class="col-sm3 col-form-label">releasejaar</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="releasejaar" value="<?php echo $releasejaar; ?>">

</div>
</div>

<div class="row mb-3">
<label class="col-sm3 col-form-label">beschrijving</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="beschrijving" value="<?php echo $beschrijving; ?>">

</div>
</div>

<div class="row mb-3">
<label class="col-sm3 col-form-label">beoordeling</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="beoordeling" value="<?php echo $beoordeling; ?>">

</div>
</div>

<div class="row mb-3">
<label class="col-sm3 col-form-label">studio</label>
<div class="col-sm-6">
    <input type="text" class="form-control" name="studio" value="<?php echo $studio; ?>">

</div>
</div>




<?php

if ( !empty($successMessage) ) {
    echo " 
    <div class='row mb-3'>
    <div class='offset-sm-3 col-sm-6'>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>$successMessage</strong>
    <button type= 'button' class='btn-close' data-bs-dismiss='alert' aria-label=''Close></button>
    </div>
    </div>
    </div>

    ";
}
?>

<div class="row mb-3">
<div class= "offset-sm-3 col-sm-3 d-grid">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
<div class= "col-sm-3 d-grid">
    <a class="btn btn-outline-primary" href="/Movie-website-V2/index.php" role="button">Cancel</a>
</div>
<div class= "col-sm-3 d-grid">
    <a class="btn btn-outline-primary" href="/Movie-website-V2/index.php" role="button">Back to list</a>
</div>

</div>


</form>

    </div>
    
</body>
</html>