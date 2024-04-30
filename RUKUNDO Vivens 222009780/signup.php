<?php
session_start();
//RUKUNDO Vivens_222009780_27_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
   $first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
   // SQL statement to insert data into the Booking table
    $sql = "INSERT INTO customers (FirstName, LastName, Phone, Address, Email,Password) VALUES ('$first_name', '$last_name', '$phone', '$address', '$email','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
