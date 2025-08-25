<!DOCTYPE html>
<html lang="en-ie">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Member Info</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
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
      <a href="drinks.php">Drinks</a>
      <a href="desserts.php">Desserts</a>
      <a href="contact.html">Contact Us</a>
    </div>
  </section>
<Section class="main">
   <div class="sub">
<?php
// PHP Code to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_et4132_group14";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get  form inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
    $is_student = $_POST['is_student'];

    // Email validation
    if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO member_info (first_name, last_name, email_address, is_student) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $first_name, $last_name, $email_address, $is_student);

    if ($stmt->execute()) {
        
        echo "<h2>You have officially become a Cafe Delight Member!</h2>";
        echo "<p>Feel free to browse our stock and avail of our exclusive offers.</p>";
    } else {
        echo "Error executing query: " . $stmt->error . "<br>";
    }

    $stmt->close();
    $conn->close();
}
?>

<img src="images/cheers.jpg" alt="two coffee mugs cheering">
	</div>
</section>



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
                <td><a href="drinks.php">Drinks Menu</a></td>
            </tr>
            <tr>
                <td><a href="desserts.php">Desserts Menu</a></td>
            </tr>
            <tr>
                <td><a href="contact.html">Contact Us</a></td>
            </tr>
        </table>
    </footer>


</body>
</html>


