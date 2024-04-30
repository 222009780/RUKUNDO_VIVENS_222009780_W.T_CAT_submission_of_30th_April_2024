<?php
session_start();
//RUKUNDO Vivens_222009780_24_April_2024
// Connect to the database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        $id = $_POST['venue_id'];
        $newname = $_POST['newname'];
        $newaddress = $_POST['newaddress'];
        $newcapacity = $_POST['newcapacity'];
        $newcontact_person = $_POST['newcontact_person'];
        
        $sql = "UPDATE venue SET Name=?, Address=?, Capacity=?, ContactPerson=? WHERE venue_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssii", $newname, $newaddress, $newcapacity, $newcontact_person, $id);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['venue_id'];

        $sql = "DELETE FROM venue WHERE venue_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
    } elseif (isset($_POST['read'])) {
        $id = $_POST['venue_id'];

        $sql = "SELECT * FROM venue WHERE venue_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "ID: " . $row["venue_id"] . "<br>";
            echo "Name: " . $row["Name"] . "<br>";
            echo "Address: " . $row["Address"] . "<br>";
            echo "Capacity: " . $row["Capacity"] . "<br>";
            echo "ContactPerson: " . $row["ContactPerson"] . "<br>";
        } else {
            echo "No venue found with the provided ID.";
        }
    }
}
?>
