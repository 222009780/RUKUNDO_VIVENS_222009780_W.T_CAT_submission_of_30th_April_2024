<?php
session_start();
//RUKUNDO Vivens_222009780_27_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

// Select all records from customers table
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

// Check if records exist
if ($result->num_rows > 0) {
    // Start HTML table
      echo "<title>The Information of customers</title>";
    echo "<h1>The Information of customers </h1>";
    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Email</th>
    <th>Password</th>
    </tr>";

    // Fetch and display each record
     while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['customer_id'] . "</td>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['Phone'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['Password'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
