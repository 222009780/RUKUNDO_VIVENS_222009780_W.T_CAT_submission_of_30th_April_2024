<?php
session_start();
//RUKUNDO Vivens_222009780_24_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['event_id'];
    $newname = $_POST['newname'];
    $newdate_event = $_POST['newdate_event'];
    $newdescription = $_POST['newdescription'];
    $newcategory = $_POST['newcategory'];
    $sql = "UPDATE event SET name=?, date=?, description=?, category=? WHERE event_id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
    } else {
        $stmt->bind_param("ssssi", $newname, $newdate, $newdescription, $newcategory, $id);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['event_id'];

    $sql = "DELETE FROM event WHERE event_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains ID
    $id = $_POST['event_id'];

    // Select event information from the database
    $sql = "SELECT * FROM event WHERE event_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display event information
        $row = $result->fetch_assoc();
        echo "ID: " . $row["event_id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Date: " . $row["date"] . "<br>";
        echo "Description: " . $row["description"] . "<br>";
        echo "Category: " . $row["category"] . "<br>";
    } else {
        echo "No event found with the provided ID.";
    }
}
?>