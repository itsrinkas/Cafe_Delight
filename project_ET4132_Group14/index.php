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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Cafe Delight</title>
  <link href="index.css" rel="stylesheet" type="text/css" />
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
  <!-- Third Section of Page -->
  <section class="main">
  <div class="about-us">
    <h2>About Us</h2>
    <p>Welcome to Cafe Delight, where every cup of coffee is brewed with passion and every bite brings joy. Nestled in
      the heart of the city, we invite you to relax, unwind, and savor the flavors of our carefully crafted beverages
      and delicious treats. Whether you're here for a cozy morning coffee, a sweet dessert break, or to catch up with
      friends, our warm atmosphere and friendly service will make you feel right at home. At Cafe Delight, it's not
      just about coffee — it's about creating delightful moments, one sip at a time.</p>

 
  </div>

  <div class="about-us-img">
    <img src="images/about-usimg.jpg" width="500px" alt="History Image">
  </div>
  <div class="history-img">
    <img src="images/history.jpg" width="500px" alt="History Image">
  </div>

  <div class="history">
    <h2>Our History</h2>
    <p>Cafe Delight began as a small passion project born out of a love for coffee and community. 
      Established in the heart of the city, we started with just a few tables and a dream to create a 
      space where people could gather, unwind, and enjoy truly great coffee. Over the years, we've grown,
       but our values have remained the same: to serve quality, handcrafted drinks and delicious treats in
        a warm and welcoming environment. From our first pour to today, we're still fueled by the smiles of
         our customers and our commitment to make every moment here a delightful one.

    </p>
  </div>
  <div class="member-club">
    <h2>Our Members Club</h2>
    <p>Join the Café Delight Members Club today and enjoy exclusive perks tailored just for you! 
        As a member, you'll get a 10% discount on every purchase if you're a student, 
        plus access to special offers, early tastings of new menu items, and loyalty points that
        turn into rewards. We even host members-only events for a more personalised café experience. 
        Joining is quick, easy, and completely free. Don’t miss out on these fantastic benefits—sign up
        now and make every visit to Café Delight that much more rewarding!</p>
    <div class="form-button-container">
        <button onclick="window.location.href='member.php'" class="member-button">
            Click Here to Join!
        </button>
    </div>
</div>

<div class="member-club-img">
    <img src="images/member.jpg" alt="Members Image" width="500px">
</div>



 <section class="special-deals">

    <h2>Leave a Review</h2>
    <form action="" method="POST">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="review_text">Your Review:</label>
        <textarea id="review_text" name="review_text" rows="5" required></textarea>
        
        <button type="submit" class="reviews-button">Submit Review</button>
    </form>
</section>
 
 <?php if (isset($message)) : ?>
    <p style="color: green; font-weight: bold;"><?= htmlspecialchars($message) ?></p>
<?php endif; ?>




<!-- Reviews Section -->
    <section class="review-slider-container">
	
	
        <!-- Left Arrow -->
        <button class="nav-arrow left-arrow">&#9664;</button>
        <!-- Reviews -->
        <div class="review-slider">
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

// Query to fetch reviews
$sql = "SELECT name, review_text, date_made FROM reviews ORDER BY date_made DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Query Error: " . $conn->error);
}

// Display reviews dynamically
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review-card'>";
        echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['review_text']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<div class='review-card'><p>No reviews yet. Be the first to leave a review!</p></div>";
}
?>

        </div>
        <!-- Right Arrow -->
        <button class="nav-arrow right-arrow">&#9654;</button>
    </section>

    <script>
        const slider = document.querySelector('.review-slider');
        const leftArrow = document.querySelector('.left-arrow');
        const rightArrow = document.querySelector('.right-arrow');

        leftArrow.addEventListener('click', () => {
            slider.scrollBy({ left: -300, behavior: 'smooth' });
        });

        rightArrow.addEventListener('click', () => {
            slider.scrollBy({ left: 300, behavior: 'smooth' });
        });

        slider.addEventListener('scroll', () => {
            leftArrow.disabled = slider.scrollLeft === 0;
            rightArrow.disabled = slider.scrollLeft + slider.offsetWidth >= slider.scrollWidth;
        });

        leftArrow.disabled = slider.scrollLeft === 0;
        rightArrow.disabled = slider.scrollLeft + slider.offsetWidth >= slider.scrollWidth;
    </script>
    
    
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