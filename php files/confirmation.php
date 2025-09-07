<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'db_et4132_group14');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the order ID from URL
$order_id = $_GET['order_id'];

// Fetch the order details
$orderQuery = "SELECT o.order_id, m.first_name, m.last_name, 
               f.food_name, d.drink_name 
               FROM orders o
               LEFT JOIN member_info m ON o.member_id = m.member_id
               LEFT JOIN food_menu f ON o.food_item_id = f.item_ID
               LEFT JOIN drinks_menu d ON o.drink_item_id = d.item_ID
               WHERE o.order_id = '$order_id'";

$orderResult = $conn->query($orderQuery);
$orderData = $orderResult->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
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
	<img src="images/order_success.jpg" width="500px" alt="coffee with smile">
	</div>
    <h2>Order Confirmation</h2>
    
    <?php if ($orderData): ?>
        <p>Thank you, <?php echo htmlspecialchars($orderData['first_name'] . ' ' . $orderData['last_name']); ?>!</p>
        <p>Your order has been placed successfully. Here are the details:</p>

        <ul>
            <li><strong>Order Number:</strong> <?php echo htmlspecialchars($orderData['order_id']); ?></li>
            <li><strong>Food Item:</strong> <?php echo htmlspecialchars($orderData['food_name'] ?? 'None'); ?></li>
            <li><strong>Drink Item:</strong> <?php echo htmlspecialchars($orderData['drink_name'] ?? 'None'); ?></li>
        </ul>
    <?php else: ?>
        <p>Sorry, we could not find your order details.</p>
    <?php endif; ?>
    <button class="sub-button" onclick="window.location.href='orders.php';">Back to Orders</button>
	
	
    
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
