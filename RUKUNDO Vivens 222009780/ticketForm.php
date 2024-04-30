<?php
session_start();
//RUKUNDO Vivens_222009780_24_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $event_id = $_POST["event_id"];
    $type = $_POST["type"];
    $price = $_POST["price"];
    $available = $_POST["available"];

    // Prepare SQL statement to insert data into the ticket table
    $sql = "INSERT INTO ticket (event_id, type, price, available) VALUES ( '$event_id', '$type', '$price', '$available')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
