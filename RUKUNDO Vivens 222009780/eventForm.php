<?php
session_start();
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

//RUKUNDO Vivens_222009780
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
 $name = $_POST['name'];
    $date = $_POST['date'];
    $description = $_POST['description'];
    $category = $_POST['category'];
   // SQL statement to insert data into the Booking table
   $sql = "INSERT INTO event (Name, Date, Description, Category)
            VALUES ('$name', '$date', '$description', '$category')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
