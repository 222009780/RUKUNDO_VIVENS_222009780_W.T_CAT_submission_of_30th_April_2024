<?php
session_start();
//RUKUNDO Vivens_222009780_27_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

// Select all records fromvenue table
$sql = "SELECT * FROM venue";
$result = $conn->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    // Start HTML table
      echo "<title>The Information of venue</title>";
    echo "<h1>The Information of venue </h1>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>Capacity</th>
    <th>ContactPerson</th>
    </tr>";

    // Fetch and display each record
     while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['venue_id'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['Capacity'] . "</td>";
        echo "<td>" . $row['ContactPerson'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
