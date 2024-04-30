<?php
session_start();
//RUKUNDO Vivens_222009780_27_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

// Select all records fromticket table
$sql = "SELECT * FROM ticket";
$result = $conn->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    // Start HTML table
      echo "<title>The Information of ticket</title>";
    echo "<h1>The Information of ticket </h1>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>EventID</th>
    <th>Type</th>
    <th>Price</th>
    <th>Available</th>
    </tr>";

    // Fetch and display each record
     while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ticket_id'] . "</td>";
        echo "<td>" . $row['event_id'] . "</td>";
        echo "<td>" . $row['type'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['available'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
