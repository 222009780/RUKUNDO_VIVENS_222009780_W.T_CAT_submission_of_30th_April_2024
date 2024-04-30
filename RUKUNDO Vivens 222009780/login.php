
<?php
//RUKUNDO Vivens_222009780_28_April_2024
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnection.php";


$uname = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT *FROM customers WHERE email='$uname' AND password='$password'";
$result =$conn->query($sql);
if ($result->num_rows >0) {
  // echo "successfully loggedin!";
  header("Location: Dashboard.html");
      exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
