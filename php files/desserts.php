<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Desserts</title>
    <link href="menu.css" rel="stylesheet" type="text/css" />
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

    <!-- Dessert Menu -->
    <div class="menu-header">
        <h2>Dessert Menu</h2>
       <button class="menu-button" onclick="window.location.href='orders.php';">Click Here to Order!</button>
        <hr>
    </div>

    <section class="menu">
        <div class="menu-container">
            <?php
            // Database credentials
            $host = "localhost";
            $user = "root";
            $pass = "";
            $data = "db_et4132_group14";

            // Connect to DBMS
            $conn = new mysqli($host, $user, $pass, $data);

            // Check connection
            if ($conn->connect_errno) {
                die("Connection Failed: " . $conn->connect_error);
            }

            // Fetch dessert data
            $sql = "SELECT * FROM food_menu;";
            $result = $conn->query($sql);

            // Check if SQL command was successful and display desserts
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $food_name = htmlspecialchars($row["food_name"]);
                    $food_price = "€" . htmlspecialchars($row["food_price"]);
                    $food_available = $row["food_available"] == 1 ? "In Stock" : "Out of Stock";

                    echo "
                    <div class='menu-item'>
                        <img src='images/menu/{$food_name}.jpg' alt='{$food_name}'>
                        <p>{$food_name}</p>
                        <p>{$food_price}</p>
                        <p class='availability'>{$food_available}</p>
                    </div>";
                }
            } else {
                echo "<p>No desserts available at the moment.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
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
