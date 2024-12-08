<?php
// Database connection parameters
$servername = "localhost"; // Server name
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "FRESHSCENT_db"; // Database name

// Enable detailed error reporting for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['FirstName'];
    $email = $_POST['Email'];
    $phoneNumber = $_POST['PhoneNumber'];
    $query = $_POST['query'];

    // Prepare and bind statement
    $stmt = $conn->prepare("INSERT INTO contact_queries (first_name, email, phone_number, query) VALUES (?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("ssss", $firstName, $email, $phoneNumber, $query);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Thank you for contacting us!');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script>alert('Database error: Unable to prepare statement');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <title>FreshScents | Contact Us</title>
    <link rel="stylesheet" type="text/css" href="ContactUs.css">
    <script src="cart.js"></script>
</head>    
<body>

<!---- header ---->
<div class="header">
	<div class="container">
	<div class="navbar">
  <a href="Home Page.php" class="logo">
    <img  src="FR  SHSCENT.jpg"  width="200px" height="90px">
  </a>
		</div>
		
		<nav>
			<ul>
				<li><a class="active" href="Home Page.php">Home</a></li> 
				<li><a href="products.php">Product</a></li>				
				<li><a class="active" href="AboutUs.php">About Us</a></li>
				<li><a href="ContactUs.php">Contact</a></li> 
                <li><a href="Cart.php"><img src="shopping bag.jpg" width="30px" height="30px"></a></li>
			</ul>
		</nav>	
	</div>
	</div>
	</div>
    </header>
	<br><br>

<div class="contact_us_6">
    <div class="responsive-container-block container">
        <form class="form-box" method="POST" action="">
            <div class="container-block form-wrapper">
                <div class="mob-text">
                    <p class="text-blk contactus-head">Get in Touch</p>
                    <p class="text-blk contactus-subhead">If you have any complaints or suggestions please, feel free to contact us.</p>
                </div>
                <div class="responsive-container-block" id="i2cbk">
                    <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i10mt-3">
                        <p class="text-blk input-title">FIRST NAME</p>
                        <input class="input" id="ijowk-3" name="FirstName" placeholder="Please enter first name..." required>
                    </div>
                    <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="ip1yp">
                        <p class="text-blk input-title">EMAIL</p>
                        <input class="input" id="ipmgh-3" name="Email" placeholder="Please enter email..." required>
                    </div>
                    <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="ih9wi">
                        <p class="text-blk input-title">PHONE NUMBER</p>
                        <input class="input" id="imgis-3" name="PhoneNumber" placeholder="Please enter phone number..." required>
                    </div>
                    <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i634i-3">
                        <p class="text-blk input-title">WHAT DO YOU HAVE IN MIND?</p>
                        <textarea class="textinput" id="i5vyy-3" name="query" placeholder="Please enter query..." required></textarea>
                    </div>
                </div>
                <button class="submit-btn" id="w-c-s-bgc_p-1-dm-id-2" type="submit">Submit</button>
            </div>
        </form>
        <div class="responsive-cell-block wk-desk-7 wk-ipadp-12 wk-tab-12 wk-mobile-12" id="i772w">
      <div class="map-part">
        <p class="text-blk map-contactus-head" id="w-c-s-fc_p-1-dm-id">
          Wanna reach out?
        </p>
        <p class="text-blk map-contactus-subhead">
          You can also find us in all social media platforms, or visit the nearest FreshScent branch. 
        </p>
        <div class="social-media-links mob">
          <a class="social-icon-link" href="#" id="ix94i-2-2">
            <img class="link-img image-block" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-twitter.png">
          </a>
          <a class="social-icon-link" href="#" id="itixd">
            <img class="link-img image-block" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-facebook.png">
          </a>
          <a class="social-icon-link" href="#" id="izxvt">
            <img class="link-img image-block" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-google.png">
          </a>
          <a class="social-icon-link" href="#" id="izldf-2-2">
            <img class="link-img image-block" src="https://workik-widget-assets.s3.amazonaws.com/Footer1-83/v1/images/Icon-instagram.png">
          </a>
        </div>
        <div class="map-box container-block">
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>