<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Drinks</title>
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

    <!-- Drinks Menu -->
    <div class="menu-header">
        <h2>Drinks Menu</h2>
        
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

            // Fetch drinks data
            $sql = "SELECT * FROM drinks_menu;";
            $result = $conn->query($sql);

            // Check if SQL command was successful
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $drink_name = htmlspecialchars($row["drink_name"]);
                    $drink_price = "€" . htmlspecialchars($row["drink_price"]);
                    $drink_available = $row["drink_available"] == 1 ? "In Stock" : "Out of Stock";

                    echo "
                    <div class='menu-item'>
                        <img src='images/drinks/{$drink_name}.jpg' alt='{$drink_name}'>
                        <p>{$drink_name}</p>
                        <p>{$drink_price}</p>
                        <p class='availability'>{$drink_available}</p>
                    </div>";
                }
            } else {
                echo "<p>No drinks available at the moment.</p>";
            }

            // Close connection
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
