<?php
session_start();
//RUKUNDO Vivens_222009780_27_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

// Select all records from event table
$sql = "SELECT * FROM event";
$result = $conn->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    // Start HTML table
      echo "<title>The Information of event</title>";
    echo "<h1>The Information of event </h1>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Date</th>
    <th>Description</th>
    <th>category</th>
    </tr>";

    // Fetch and display each record
     while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['event_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
