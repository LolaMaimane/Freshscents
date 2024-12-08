<?php
// Database connection parameters
$servername = "localhost"; // Change to your server name
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "freshscent_db"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    
    <title>FreshScents | Home</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet"  href="Home Page.css">
	<style>
	
	footer {
    background-color:#AFE1AF ;
    text-align: center;
    padding: 10px 0;
	} 
	
	</style>	
	
</head>
<body >
	
	<div class = "header">
	<div class = "container">
	<div class = "navbar">
		<div class = "logo">
			<img src="FR  SHSCENT.jpg" width="200px" height="90px">
		</div>
		
		<nav>
			<ul>
				
				<li><a class="active" href="Home Page.php">Home</a></li>
				<li><a href="products.php">Product</a></li>
				<li><a class="active" href="AboutUs.php">AboutUs</a></li> 
                <li><a href="ContactUs.php">Contact</a></li>  
				<li><a href="logout.php">LogOut</a></li>
                <li><a href="Cart.php"><img src="shopping bag.jpg" width="30px" height="30px"></a></li>

			</ul>
		</nav>	
		
	</div>
	</div>
	</div>
	
	<div class="row">
                <div class="col-2">
					<h4>WELCOME TO FRESHSCENTS</h4>
                    <h1>Freshen Up Your Life with Every Breath!</h1>
                    <a href="products.php" class="btn">Shop Now</a>
					<br><br><br>
                </div>
		</div>
	
	<section class="feature" class="section-p1">
		 <div class="fe-box">
			<img src="Order.jpg" width="100px" height="100px" alt="">
			<h6>Order Online</h6>
		</div>
		<div class="fe-box">
			<img src="Save.jpg" width="100px" height="100px" alt="">
			<h6>Save Money</h6>
		</div>
		<div class="fe-box">
			<img src="Promotions.jpg" width="100px" height="100px" alt="">
			<h6>Sale</h6>
		</div>
		<div class="fe-box">
			<img src="Support.jpg" width="100px" height="100px" alt="">
			<h6>24/7 Support</h6>
		</div>
	</section>
	
	<br><br><br>
	
	<section class="product1" class="section-p1">
		<h1>Featured Products</h1>
		<p>Summer Collection With a Brand New Smell</p>
		<div class="pro-container">
			<div class="pro">
				<img src="items/Perfume2.jpg" alt= "" width = "200px" height = "200px">
				<span>Better Life</span>
				<div class="des">
					<h5>Desert Bloom 140ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
					</div>
					<p class="price">R259.99</p>
				</div>
			</div>
		
			<div class="pro">
				<img src="items/Body lotion1.jpg" width="200px" height="200px" alt="">
				<span>Better Life</span>
				<div class="des">
					<h5>Rose Essence 450ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9734;</span>					
					</div>
					<p class="price">R179.99</p>
				</div>
			</div>
		
			<div class="pro">
				<img src="items/Body lotion2.jpg" alt=" "  width = "200px" height = "200px">
				<span>Better Life</span>
				<div class="des">						
					<h5>Ocean Breeze 450ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9734;</span>
					</div>
					<p class="price">R169.99</p>
				</div>
			</div>
			
			<div class="pro">
				<img src="items/Body wash3.jpg" alt="" width = "200px" height = "200px">
				<span>Better Life</span>
				<div class="des">
					<h5>Citrus Burst 450ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
					</div>
            		<p class="price">R199.99</p>
				</div>
			</div>
			
			<div class="pro">
				<img src="items/Perfume5.jpg" alt=" " width = "200px" height = "215px">
				<span>Better Life</span>
				<div class="des">
					<h5>Midnight Rose 120ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733 ;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R209.99</p>
				</div>
			</div>
			
			<div class="pro">
				<img src="items/Body wash5.jpg" alt=" " width = "200px" height = "215px">
				<span>Better Life</span>
				<div class="des">
					<h5>Himalayan Rose 450ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
						<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R179.99</p>
				</div>
			</div>
			
			<div class="pro">
				<img src="items/Shea Butter2.jpg" alt=" " width = "200px" height = "200px">
				<span>Better Life</span>
				<div class="des">
					<h5>Lavender & Chamomile 100ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R129.99</p>
				</div>
			</div>
			
			<div class="pro">
				<img src="items/Body lotion4.jpg" alt=" " width = "200px" height = "200px">
				<span>Better Life</span>
				<div class="des">
					<h5>Citrus Grove 450ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R159.99</p>
				</div>
			</div>
			
		</div>
		
	</section>
	<br><br><br>
	
	<footer>
        <p> 2024 FreshScents<br>
		Email: info@freshscents.com<br> 
		Phone: +27 13 755 2500<br>
		Office Address: 15 Kopane Bld<br> 
		Cnr President Kruger<br>
		Vanderbijlpark<br>
		1900<br>
		For all social media platforms<br>
		@freshscents_1156</p>
		
    </footer>
	<script src="Script.js"></script>
</body>
</html>