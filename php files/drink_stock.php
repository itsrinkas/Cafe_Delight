<!doctype html>
<html lang="en-ie">
<head>
    <meta charset="utf-8" />
    <title>Drinks Available</title>
    <link href="stock.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="images/logo.jpg">
</head>
<body>

<!-- First Section of Page -->
<section class="top_banner">
    Cafe Delight
    <br />
    <div class="logo-img">
        <img src="images/logo.jpg" width="100px">
    </div>

    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="index.php">Home</a>
        <a href="drinks.html">Drinks</a>
        <a href="desserts.html">Desserts</a>
        <a href="contact.html">Contact Us</a>
    </div>
</section>

<?php
// Database credentials
$host = "localhost";
$user = "root";
$pass = "";
$data = "db_et4132_group14";

// 1. Connect to DBMS
$conn = new mysqli($host, $user, $pass, $data);

// Check connection
if ($conn->connect_errno) {
    die("Connection Failed: " . $conn->connect_error . "</body></html>");
}

// 2. SQL Command
$sql = "SELECT * FROM drinks_menu;";
$result = $conn->query($sql);

// Check if SQL command was successful
if (!$result) {
    die("Error retrieving data: " . $conn->error . "</body></html>");
}

// 3. Display Table or Message if No Data
if ($result->num_rows > 0) {
    echo '<table class="drinks-table">';
    echo "<tr><th>Drink</th><th>Price</th><th>Availability</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $drink_name = htmlspecialchars($row["drink_name"]);
        $drink_price = "€" . htmlspecialchars($row["drink_price"]);
        $drink_available = $row["drink_available"] == 1 ? "In Stock" : "Out of Stock";

        echo "<tr><td>$drink_name</td><td>$drink_price</td><td>$drink_available</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align:center; font-size:20px; color:#694747;'>No drinks available at the moment.</p>";
}

// Close the database connection
$conn->close();
?>

<!-- Footer -->
<footer class="footer">
    <div class="footimg">
        <img src="images/logo.jpg" width="100px">
    </div>

    <table class="info-table">
        <tr>
            <td>&#9660; Limerick City</td>
        </tr>
        <tr>
            <td>📞 +353 87 272 2828</td>
        </tr>
        <tr>
            <td>✉️ info@cafedelight.com</td>
        </tr>
    </table>

    <table class="foot-nav">
        <tr>
            <td><a href="index.php">Home</a></td>
        </tr>
        <tr>
            <td><a href="drinks.html">Drinks Menu</a></td>
        </tr>
        <tr>
            <td><a href="desserts.html">Desserts Menu</a></td>
        </tr>
        <tr>
            <td><a href="contact.html">Contact Us</a></td>
        </tr>
    </table>
</footer>

</body>
</html>
