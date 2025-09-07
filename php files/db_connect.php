<?php
// Database connection settings
$host = "localhost";
$user = "root"; // Database username
$pass = "";     // Database password (leave empty for XAMPP by default)
$data = "db_et4132_group14"; // Database name

// Create the database connection
$conn = new mysqli($host, $user, $pass, $data);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>
