<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $member_id = $_POST['member_id'];
    $food_item_id = $_POST['food_item_id'];
    $drink_item_id = $_POST['drink_item_id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'db_et4132_group14');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert order into the orders table
    $orderQuery = "INSERT INTO orders (member_id, food_item_id, drink_item_id) 
                   VALUES ('$member_id', '$food_item_id', '$drink_item_id')";

    if ($conn->query($orderQuery) === TRUE) {
        // Redirect or show success message
        header("Location: confirmation.php"); // Redirect to confirmation page
        exit(); // Ensure no further code is executed
    } else {
        // Handle the error if the query fails
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    // Close the connection
    $conn->close();
}
?>
