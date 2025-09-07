<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'db_et4132_group14');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $member_id = $_POST['member_id'];
    $food_item_id = !empty($_POST['food_item_id']) ? $_POST['food_item_id'] : NULL;
    $drink_item_id = !empty($_POST['drink_item_id']) ? $_POST['drink_item_id'] : NULL;

    // Validate selection
    if (empty($food_item_id) && empty($drink_item_id)) {
        echo "You must select at least one item (either food or drink).";
        exit();
    }

    // Insert order into the database
    $insertQuery = "INSERT INTO orders (member_id, food_item_id, drink_item_id)
                    VALUES ('$member_id', " . ($food_item_id ? "'$food_item_id'" : "NULL") . ", " . ($drink_item_id ? "'$drink_item_id'" : "NULL") . ")";
    if ($conn->query($insertQuery) === TRUE) {
        // Get the last inserted order ID
        $order_id = $conn->insert_id;

        // Redirect to confirmation page with order ID
        header("Location: confirmation.php?order_id=" . $order_id);
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
