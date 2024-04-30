<?php
session_start();
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $address = $_POST["address"];
    $capacity = $_POST["capacity"];
    $contact_person = $_POST["contact_person"];

    // You can perform validation here if required



    // Insert data into the venue table
    $sql = "INSERT INTO venue (Name, Address, Capacity, ContactPerson) VALUES ( '$name', '$address', '$capacity', '$contact_person')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
