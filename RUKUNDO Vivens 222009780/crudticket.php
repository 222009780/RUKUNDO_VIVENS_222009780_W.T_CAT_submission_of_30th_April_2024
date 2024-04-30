<?php
session_start();
//RUKUNDO Vivens_222009780_24_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['ticket_id'];
    $newevent_id = $_POST['newevent_id'];
    $newtype = $_POST['newtype'];
    $newprice = $_POST['newprice'];
    $newavailable = $_POST['newavailable'];
    
    // Corrected SQL statement
    $sql = "UPDATE ticket SET event_id=?, type=?, price=?, available=? WHERE ticket_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $newevent_id, $newtype, $newprice, $newavailable, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['ticket_id'];

    $sql = "DELETE FROM ticket WHERE ticket_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains ticket_id
    $id = $_POST['ticket_id'];

    // Select ticket information from the database
    $sql = "SELECT * FROM ticket WHERE ticket_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display ticket information
        $row = $result->fetch_assoc();
        echo "ID: " . $row["ticket_id"] . "<br>";
        echo "Event_id: " . $row["event_id"] . "<br>";
        echo "Type: " . $row["type"] . "<br>";
        echo "Price: " . $row["price"] . "<br>"; // Corrected typo here
        echo "Available: " . $row["available"] . "<br>";
    } else {
        echo "No ticket found with the provided ID.";
    }
}
?>
