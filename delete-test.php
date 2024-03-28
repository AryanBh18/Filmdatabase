<?php include('index.php');
// Database connection parameters
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "filmdatabase"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the record ID is provided via GET request
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Escape any special characters to prevent SQL injection
    $id = $conn->real_escape_string($_GET['id']);
    
    // SQL query to delete a record with a specific ID
    $sql = "DELETE FROM films WHERE id = '$id'";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Record ID is not provided";
}

// Close connection
$conn->close();
?>