
<?php
session_start();
//RUKUNDO Vivens_222009780_24_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['BookingID'];
    $newcustomer_id = $_POST['newcustomer_id'];
    $newdate = $_POST['newdate'];
    $newnumber_of_tickets = $_POST['newnumber_of_tickets'];
    $newticket_id = $_POST['newticket_id'];

    $sql = "UPDATE booking SET customer_id=?, Date=?, NumberOfTickets=?, ticket_id=? WHERE BookingID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $newcustomer_id,  $nedate, $newnumber_of_tickets,$newticket_id, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['BookingID'];

    $sql = "DELETE FROM booking WHERE BookingID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains BookingID
    $id = $_POST['BookingID'];

    // Select user_admin's information from the database
    $sql = "SELECT * FROM booking WHERE BookingID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_admin information
        $row = $result->fetch_assoc();
        echo "BookingID: " . $row["BookingID"] . "<br>";
        echo "customer_id: " . $row["customer_id"] . "<br>";
        echo "Date: " . $row["Date"] . "<br>";
        echo "NumberOfTickets: " . $row["NumberOfTickets"] . "<br>";
        echo "TicketID: " . $row["ticket_id"] . "<br>";
    } else {
        echo "No user found with the provided ID.";
    }
}
