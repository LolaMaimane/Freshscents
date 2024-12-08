<?php
// Database connection parameters
$servername = "localhost"; // Change to your server name
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "FRESHSCENT_db"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <title>FreshScents | About Us</title>
    <link rel="stylesheet" type="text/css" href="product.css">
    <script src="cart.js"></script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E8E1E6;
        }
        
        header {
            background-color: #A6D609;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        
        .AboutUs {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        
        h1, h2 {
            margin: 0;
        }
        
        footer {
            background-color: #AFE1AF;
            text-align: center;
            padding: 10px 0;
        } 
    </style>
</head>    
<body>

<header>
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
                    <li><a href="Cart.php"><img src="shopping bag.jpg" alt="Shopping Cart" width="30px" height="30px"></a></li>
                </ul>
            </nav>    
        </div>
    </div>
</header>

<main class="AboutUs">
    <h2>Mission</h2>
    <p>FreshScent’s mission is to provide consumers with sustainable, chemical-free cosmetics that meet high standards of environmental responsibility and personal care. By prioritizing natural ingredients and eco-friendly production practices, FreshScent aims to raise awareness about sustainable beauty while enhancing the shopping experience for eco-conscious consumers.</p>

    <h2>Vision</h2>
    <p>FreshScent envisions becoming a trusted leader in the natural cosmetics market by offering accessible, all-natural products that promote healthy self-care routines. Through a digital-first approach, FreshScent aspires to expand its reach and foster a community of loyal customers who prioritize sustainability and wellness in their beauty choices.</p>

    <h2>Frequently Asked Questions</h2>
    <h3>What makes FreshScent products different from other cosmetics?</h3>
    <p>FreshScent products are made from natural, chemical-free ingredients that are environmentally friendly and skin-safe. The company uses sustainably sourced materials and avoids harmful additives like parabens.</p>
    
    <h3>Are FreshScent products organic and eco-friendly?</h3>
    <p>Yes, FreshScent products are crafted from organic, plant-based ingredients and use environmentally conscious packaging, supporting the brand's commitment to sustainability.</p>
    
    <h3>What payment methods are accepted on the FreshScent website?</h3>
    <p>The FreshScent website accepts multiple payment options, including credit cards and Pay Pal, ensuring a secure and seamless shopping experience.</p>

    <h3>Does FreshScent have a return policy?</h3>
    <p>FreshScent provides a customer satisfaction guarantee, allowing returns or exchanges under certain conditions. Visit the website’s return policy page for more information.</p>

    <h2>History</h2>
    <p>FreshScent, the company behind the "Better Life" brand, was founded with a focus on delivering organic, chemical-free personal care products. Originally, FreshScent relied on local stores and word-of-mouth marketing, limiting its reach. However, increasing interest in natural and sustainable cosmetics has driven the company to expand into e-commerce. This strategic shift enables FreshScent to connect with a broader audience while staying true to its commitment to environmental stewardship. With a small-scale, local manufacturing approach, FreshScent has maintained strict quality standards, establishing itself as a credible source of safe and natural personal care products.</p>
</main>

<footer>
    <p>2024 FreshScents<br>
    Email: info@freshscents.com<br> 
    Phone: +27 13 755 2500<br>
    Office Address: 15 Kopane Bld<br> 
    Cnr President Kruger<br>
    Vanderbijlpark<br>
    1900<br>
    For all social media platforms<br>
    @freshscents_1156</p>
</footer>

</body>
</html>

<?php
$con=mysqli_connect("localhost","root","","FRESHSCENT_db");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit;
}
$conn->close();
 ?> 