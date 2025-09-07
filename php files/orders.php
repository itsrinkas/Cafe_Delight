<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'db_et4132_group14');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
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
<section class="main">
<div class="mainimg">
	<img src="images/order_page.jpg" alt="two guys holding coffee" width="700px" >
	</div>
    <h2>Order Form</h2>
    <form action="process_order.php" method="POST">
        <label for="member_id">Member:</label>
        <select id="member_id" name="member_id" required>
            <?php
            // Fetch members
            $memberQuery = "SELECT member_id, first_name, last_name FROM member_info";
            $memberResult = $conn->query($memberQuery);
            while ($row = $memberResult->fetch_assoc()) {
                echo "<option value='" . $row['member_id'] . "'>" . $row['first_name'] . " " . $row['last_name'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="food_item_id">Food Item:</label>
        <select id="food_item_id" name="food_item_id">
            <option value="">None</option>
            <?php
            // Fetch food items
            $foodQuery = "SELECT item_ID, food_name FROM food_menu WHERE food_available = 1";
            $foodResult = $conn->query($foodQuery);
            while ($row = $foodResult->fetch_assoc()) {
                echo "<option value='" . $row['item_ID'] . "'>" . $row['food_name'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="drink_item_id">Drink Item:</label>
        <select id="drink_item_id" name="drink_item_id">
            <option value="">None</option>
            <?php
            // Fetch drink items
            $drinkQuery = "SELECT item_ID, drink_name FROM drinks_menu WHERE drink_available = 1";
            $drinkResult = $conn->query($drinkQuery);
            while ($row = $drinkResult->fetch_assoc()) {
                echo "<option value='" . $row['item_ID'] . "'>" . $row['drink_name'] . "</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" name="submit" value="Place Order">
    </form>
	
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
