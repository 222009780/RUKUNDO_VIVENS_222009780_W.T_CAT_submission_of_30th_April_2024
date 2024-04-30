<?php
session_start();
//RUKUNDO Vivens_222009780_24_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['customer_id'];
    $newlast_name = $_POST['newlast_name'];
    $newfirst_name = $_POST['newfirst_name'];
    $newphone = $_POST['newphone'];
    $newaddress = $_POST['newaddress'];
    $newemail = $_POST['newemail'];
    $newpassword = $_POST['newpassword'];
  $sql = "UPDATE customers SET FirstName=?, LastName=?, Phone=?, Address=?, Email=?,Password=? where customer_id=?";
    $stmt = $conn->prepare($sql);
     $stmt->bind_param("ssssssi", $newlast_name, $newfirst_name, $newphone, $newaddress, $newemail, $newpassword, $id);
    

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['customer_id'];

    $sql = "DELETE FROM customers WHERE customer_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['read'])) {
    // Assuming the session contains customer_id
    $id = $_POST['customer_id'];

    // Select user_admin's information from the database
    $sql = "SELECT * FROM customers WHERE customer_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch and display user_admin information
        $row = $result->fetch_assoc();
        echo "Customer_id: " . $row["customer_id"] . "<br>";
        echo "First Name: " . $row["FirstName"] . "<br>";
        echo "Last Name: " . $row["LastName"] . "<br>";
        echo "Phne: " . $row["Phone"] . "<br>";
        echo "Address: " . $row["Address"] . "<br>";
        echo "Email: " . $row["Email"] . "<br>";
        echo "password: " . $row["Password"] . "<br>";
    } else {
        echo "No user found with the provided ID.";
    }
}