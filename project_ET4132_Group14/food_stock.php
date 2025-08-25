<!doctype html>
<html lang="en-ie">
<head>
	<meta charset="utf-8" />
	<title>Desserts Available</title>
	<link href="stock.css" rel="stylesheet" type="text/css" />
	<link rel="icon" href="images/logo.jpg">
</head>
<body >

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

	<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$data = "db_et4132_group14";
	
	// 1. Connect to DBMS
	$conn = new mysqli($host, $user, $pass, $data);
	
	if($conn->connect_errno)	{
		die("Connection Failed</body></html>") ;
	}
	
	// 3. Run your SQL Command
	$sql = "SELECT * FROM food_menu;";
	$result = $conn->query($sql);
	
	// 4. Process the information
	echo '<table class="drinks-table">';
	echo "<tr><th>Dessert</th><th>Price</th><th>Availability</th></tr>";
	while( $row = $result->fetch_assoc() ) {
		$food_name = $row["food_name"];
		$food_price = "€" . $row["food_price"];
		$food_available = $row["food_available"] == 1 ? "In Stock" : "Out of Stock";
		
		echo "<tr><td>$food_name</td><td>$food_price</td><td>$food_available</td></tr>";
	}
	echo "</table>";
	
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
