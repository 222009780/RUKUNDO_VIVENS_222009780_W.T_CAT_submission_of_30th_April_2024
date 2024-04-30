<?php
session_start();
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

// Select all records from Booking table
$sql = "SELECT * FROM Booking";
$result = $conn->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    // Start HTML table
      echo "<title>The Information of Booking</title>";
    echo "<h1>The Information of Booking </h1>";
    echo "<table border='1'>
    <tr>
    <th>Booking ID</th>
    <th>Customer ID</th>
    <th>Date</th>
    <th>Number of Tickets</th>
    <th>Ticket ID</th>
    </tr>";

    // Fetch and display each record
     while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['BookingID'] . "</td>";
        echo "<td>" . $row['customer_id'] . "</td>";
        echo "<td>" . $row['Date'] . "</td>";
        echo "<td>" . $row['NumberOfTickets'] . "</td>";
        echo "<td>" . $row['ticket_id'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
