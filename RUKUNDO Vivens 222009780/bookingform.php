<?php
session_start();
//RUKUNDO Vivens_222009780_27_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_id = $_POST['customer_id'];
    $ticket_id = $_POST['ticket_id'];
    $date = $_POST['date'];
    $number_of_tickets = $_POST['number_of_tickets'];

    // SQL statement to insert data into the Booking table
    $sql = "INSERT INTO booking (customer_id, ticket_id, Date, NumberOfTickets) VALUES ( '$customer_id', '$ticket_id', '$date', '$number_of_tickets')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
