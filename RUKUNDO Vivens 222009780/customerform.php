<?php
//RUKUNDO Vivens_222009780_24_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";

// Retrieve form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];

// SQL statement to insert data into the customers table
$sql = "INSERT INTO customers (FirstName, LastName, Phone, Address, Email, Password) VALUES (?, ?, ?, ?, ?, ?)";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind parameters and execute the statement
$stmt->bind_param("ssssss", $first_name, $last_name, $phone, $address, $email, $password);

if ($stmt->execute()) {
    // If insertion is successful, output a JavaScript function call to display a success message
    echo '<script>displaySuccessMessage();</script>';
} else {
    // If there's an error, output the error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>
