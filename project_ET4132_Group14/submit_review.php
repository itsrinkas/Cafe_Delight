<?php
// Database connection
$host = "localhost";
$user = "root"; // Database username
$pass = "";     // Database password (empty for XAMPP by default)
$data = "db_et4132_group14"; // Database name

$conn = new mysqli($host, $user, $pass, $data);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Initialize the message variable
$message = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $review_text = $conn->real_escape_string($_POST['review_text']);
    $date_made = date('Y-m-d H:i:s'); // Current date and time

    // Insert into the database
    $sql = "INSERT INTO reviews (name, review_text, date_made) VALUES ('$name', '$review_text', '$date_made')";

    if ($conn->query($sql) === TRUE) {
        $message = "Review submitted successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>
