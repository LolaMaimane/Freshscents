<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "FRESHSCENT_db"; 

// Enable detailed error reporting for mysqli
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database based on the search query
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
$sql = "SELECT * FROM Products WHERE name LIKE ? OR description LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%" . $searchQuery . "%"; // Using wildcards for partial matches
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <title>FreshScents | Product Page</title>
    <link rel="stylesheet" type="text/css" href="product.css">
    <style>
        .searchbar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
            width: 100%;
        }
        .searchbar input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 250px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 5px;
        }
        .searchbar button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #AFE1AF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .searchbar button:hover {
            background-color: #9cc49c;
        }
        .product {
            display: none; /* Hide all products by default */
        }
        .product.visible {
            display: inline-block; /* Show products that match the search */
        }
        footer {
            background-color: #AFE1AF;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>

	<!---- header ---->
    <div class="header">
	<div class="container">
	<div class="navbar">
		<div class="logo">
			<img src="FR  SHSCENT.jpg" width="200px" height="90px">
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

	<!---- searching bar ---->
    <div class="searchbar">
        <form action="" method="GET">       
            <input placeholder="Search..." id="search" name="query" type="text" required>
            <button type="submit">Search</button>
        </form>
    </div>
	
	<!---- products section ---->	
	<h1>Products</h1>
	<section class="products"><class="section-p1">
	<?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img src="' . htmlspecialchars($row["image_url"]) . '" alt="' . htmlspecialchars($row["name"]) . '" width="150" height="150">';
                    echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
                    echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
                    echo '<p>Price: R' . number_format($row["price"], 2) . '</p>';
                    echo '<button class="add" onclick="addToCart(\'' . addslashes($row["name"]) . '\', ' . $row["price"] . ')">Add to Cart</button>';
                    echo '</div>';
                }
            } else {
                echo "<p>No products found.</p>";
            }
            ?>
			     
	<h1><u><i>Body Lotion</i></u></h1>   
	<div class="pro-container">
        <div class="pro">
            <img src="items/Body lotion2.jpg" alt=" "  width="200px" height="200px">
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
				<button class="add" onclick="addToCart('Ocean Breeze 450ml', 169.99)">Add to Cart</button>
			</div>	
        </div>
		
		<div class="pro">
            <img src="items/Body lotion1.jpg" alt=" " width="200px" height="200px" alt="">
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
				<button class="add" onclick="addToCart('Rose Essence 450ml', 179.99)">Add to Cart</button>
			</div>
		</div>
		
        <div class="pro">
            <img src="items/Body lotion3.jpg" alt="" width="200px" height="200px">
			<span>Better Life</span>
			<div class="des">
				<h5>Tropical Paradise 450ml</h5>
				<div class="star">
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9734;</span>
				</div>
				<p class="price">R149.99</p>
				<button class="add" onclick="addToCart('Tropical Paradise', 149.99)">Add to Cart</button>
			</div>  
		</div>
		
		<div class="pro">
            <img src="items/Body lotion4.jpg" alt="" width="200px" height="180px">
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
				<button class="add" onclick="addToCart('Citrus Grove', 159.99)">Add to Cart</button>
			</div>
        </div>
		
		<div class="pro">
            <img src="items/Body lotion5.jpg" alt="" width="200px" height="200px">
			<span>Better Life</span>
			<div class="des">
				<h5>Mint Bliss 450ml</h5>
				<div class="star">
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9734;</span>
				</div>
				<p class="price">R169.99</p>
				<button class="add" onclick="addToCart('Mint Bliss', 169.99)">Add to Cart</button>
			</div>
        </div>
		
		<div class="pro">
            <img src="items/Body lotion6.jpg" alt="" width="200px" height="200px">
			<span>Better Life</span>
			<div class="des">
				<h5>Lemongrass Fields 450ml</h5>
				<div class="star">
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9734;</span>
				</div>
				<p class="price">R149.99</p>
				<button class="add" onclick="addToCart('Lemongrass Fields', 149.99)">Add to Cart</button>
			</div>
        </div>
		
		<div class="pro">
            <img src="items/Body lotion7.jpg" alt="" width="200px" height="200px">
			<span>Better Life</span>
			<div class="des">
				<h5>Berry Harvest 400ml</h5>
				<div class="star">
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9734;</span>
					<span class="star">&#9734;</span>
				</div>
				<p class="price">R139.99</p> <button class="add" onclick="addToCart('Berry Harvest', 139.99)">Add to Cart</button>
			</div>
        </div>
		
		<div class="pro">
            <img src="items/Body lotion8.jpg" alt="" width="200px" height="200px">
			<span>Better Life</span>
			<div class="des">
				<h5>Honeysuckle Bloom 450ml</h5>
				<div class="star">
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9734;</span>
				</div>
				<p class="price">R159.99</p>
				<button class="add" onclick="addToCart('Honeysuckle Bloom', 159.99)">Add to Cart</button>
			</div>
        </div>
	</div>
	
	<h1><u><i>Perfume</i></u></h1>
	<div class="pro-container">
		<div class="pro">
            <img src="items/Perfume1.jpg" alt=" " width="200px" height="200px">
			<span>Better Life</span>
			<div class="des">
				<h5>Forest Whisper 120ml</h5>
				<div class="star">
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9734;</span>
					<span class="star">&#9734;</span>
				</div>
				<p class="price">R249.99</p>
				<button class="add" onclick="addToCart('Forest Whisper', 249.99)">Add to Cart</button>
			</div>
        </div>
		
		<div class="pro">
            <img src="items/Perfume2.jpg" alt=" " width="200px" height="200px">
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
				<button class="add" onclick="addToCart('Desert Bloom', 259.99)">Add to Cart</button>
			</div>
        </div>
		
		<div class="pro">
            <img src="items/Perfume3.jpg" alt="" width="200px" height="200px">
			<span>Better Life</span>
			<div class="des">
				<h5>Blooming Jasmine 120ml</h5>
				<div class="star">
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9734;</span>
				</div>
				<p class="price">R169.99</p>
				<button class="add" onclick="addToCart('Blooming Jasmine', 169.99)">Add to Cart</button>
			</div>
        </div>

        <div class="pro">
            <img src="items/Perfume4.jpg" alt="" width="200px" height="200px">
			<span>Better Life</span>
			<div class="des">
				<h5>Mountain Air 150ml</h5>
				<div class="star">
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
					<span class="star">&#9733;</span>
				</div>
				<p class="price">R249.99</p>
				<button class="add" onclick="addToCart('Mountain Air', 249.99)">Add to Cart</button>			
			</div>
        </div>

		<div class="pro">
				<img src="items/Perfume5.jpg" alt=" " width="200px" height="215px">
				<span>Better Life</span>
				<div class="des">
					<h5>Midnight Rose 120ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R209.99</p>
					<button class ="add" onclick="addToCart('Midnight Rose', 209.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Perfume6.jpg" alt=" " width="200px" height="215px">
				<span>Better Life</span>
				<div class="des">
					<h5>Seaside Serenity 120ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R219.99</p>
					<button class ="add" onclick="addToCart('Seaside Serenity', 219.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Perfume7.jpg" alt=" " width="200px" height="215px">
				<span>Better Life</span>
				<div class="des">
					<h5>Citrus Grove 100ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R159.99</p>
					<button class ="add" onclick="addToCart('Citrus Grove', 159.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Perfume8.jpg" alt=" " width="200px" height="215px">
				<span>Better Life</span>
				<div class="des">
					<h5>Rain-kissed Petals 120ml</h5>
					<div class="star">
						<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R239.99</p>
					<button class ="add" onclick="addToCart('Rain-kissed Petals', 239.99)">Add to Cart</button>
				</div>
        </div>
	</div>
	
	<h1><u><i>Body Wash</i></u></h1>
	<div class="pro-container">
        <div class="pro">
				<img src="items/Body wash1.jpg" alt="" width="200px" height="200px">
				<span>Better Life</span>
				<div class="des">
					<h5>Tea Tree & Lemon 400ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R159.99</p>
					<button class="add" onclick="addToCart('Tea Tree & Lemon', 159.99)">Add to Cart</button>
				</div>
        </div>

        <div class="pro">
				<img src="items/Body wash2.jpg" alt=" " width="200px" height="200px ```php
">
				<span>Better Life</span>
				<div class="des">
					<h5>Lavender Fields 400ml</h5>
					<div class="star">
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
					</div>
            		<p class="price">R179.99</p>
        			<button class="add" onclick="addToCart('Lavender Fields', 179.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Body wash3.jpg" alt=" " width="200px" height="200px">
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
        			<button class="add" onclick="addToCart('Citrus Burst', 199.99)">Add to Cart</button>
				</div>
        </div>

		<div class="pro">
            <img src="items/Body wash4.jpg" alt= " " width="200px" height="200px">
			<span>Better Life</span>
				<div class="des">
					<h5>Ocean Mist 450ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
            		<p class="price">R149.99</p>
        			<button class="add" onclick="addToCart('Ocean Mist', 149.99)">Add to Cart</button>
				</div>
        </div>
				
		<div class="pro">
				<img src="items/Body wash5.jpg" alt= " " width="200px" height="200px">
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
        			<button class="add" onclick="addToCart('Himalayan Rose', 179.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Body wash6.jpg" alt= "" width="200px" height="200px">
				<span>Better Life</span>
				<div class="des">
					<h5>Coconut & Aloe 450ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
            		<p class="price">R189.99</p>
        			<button class="add" onclick="addToCart('Coconut & Aloe', 189.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Body wash7.jpg" alt= "" width="200px" height="200px">
				<span>Better Life</span>
				<div class="des">
					<h5>Eucalyptus & Mint 450ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
            		<p class="price">R159.99</p>
        			<button class="add" onclick="addToCart('Eucalyptus & Mint', 159.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Body wash8.jpg" alt= "" width="200px" height="200px">
				<span>Better Life</span>
				<div class="des">
					<h5>Jasmine Blossom 450ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
            		<p class="price">R189.99</p>
        			<button class="add" onclick="addToCart('Jasmine Blossom', 189.99)">Add to Cart</button>
				</div>
        </div>
	</div>
	
	<h1><u><i>Shea Butter for Skin</i></u></h1>
	<div class="pro-container">
		<div class="pro">
				<img src="items/Shea Butter1.jpg" alt= "" width="140px" height="120px">
				<span>Better Life</span>
				<div class="des">
            		<h5>Cocoa & Vanilla Bean 120ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
					</div>
            		<p class="price">R100.00</p>
					<button class="add" onclick="addToCart('Cocoa & Vanilla Bean', 100.00)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Shea Butter2.jpg" alt= "" width="140px" height="120px">
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
					<button class="add" onclick="addToCart('Lavender & Chamomile', 139.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Shea Butter3.jpg" alt= "" width="140px" height="120px">
				<span>Better Life</span>
				<div class="des">
            		<h5>Citrus Blossom 120ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
            		<p class="price">R139.99</p>
					<button class="add" onclick="addToCart('Citrus Blossom', 139.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Shea Butter4.jpg" alt= "" width="140px" height="120px">
				<span>Better Life</span>
				<div class="des">
            		<h5>Pineapple & Papaya 120ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
            		<p class="price">R109.99</p>
					<button class="add" onclick="addToCart('Pineapple & Papaya', 109.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Shea Butter5.jpg" alt= "" width="140px" height="120px">
				<span>Better Life</span>
				<div class="des">
            		<h5>Wild Rose & Bergamot 100ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R114.99</p>
					<button class="add" onclick="addToCart('Wild Rose & Bergamot', 114.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Shea Butter6.jpg" alt= "" width="140px" height="120px">
				<span>Better Life</span>
				<div class="des">
            		<h5>Sea Salt & Driftwood 120ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R129.99</p>
					<button class="add" onclick="addToCart('Sea Salt & Driftwood', 129.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Shea Butter7.jpg" alt= "" width="140px" height="120px">
				<span>Better Life</span>
				<div class="des">
            		<h5>Hibiscus & Rosehip 120ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R119.99</p>
					<button class="add" onclick="addToCart('Hibiscus & Rosehip', 119.99)">Add to Cart</button>
				</div>
        </div>
		
		<div class="pro">
				<img src="items/Shea Butter8.jpg" alt= "" width="140px" height="120px">
				<span>Better Life</span>
				<div class="des">
            		<h5>Cedarwood & Sage 120ml</h5>
					<div class="star">
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9733;</span>
            			<span class="star">&#9734;</span>
					</div>
					<p class="price">R109.99</p>
					<button class="add" onclick="addToCart('Cedarwood & Sage', 109.99)">Add to Cart</button>
				</div>
				</div><class="products">
				</div>
				 </section>
</div>
	
       <!---- footer ---->
    <footer>
        <p> 2024 FreshScents<br>
        Email: info@freshscents.com<br> 
        Phone: +27 13 755 2500<br>
        Office Address: 15 Kopane Bld<br> 
    </footer>
	<script src="cart.js"></script>
	<script>
	document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('search');
        const products = document.querySelectorAll('.product');
        const cart = []; // Array to hold cart items

        // Function to filter products based on input
        function filterProducts() {
            const searchValue = input.value.toLowerCase();
            let found = false; // Flag to check if any product is found
            
            products.forEach(product => {
                const productName = product.querySelector('h3').innerText.toLowerCase();
                if (productName.includes(searchValue)) {
                    product.classList.add('visible'); // Show matching product
                    found = true; // Set found to true
                } else {
                    product.classList.remove('visible'); // Hide non-matching product
                }
            });
            
            // If no products are found, you can display a message or handle it as needed
            if (!found && searchValue) {
                alert("No products found matching your search.");
            }
        }

        // Function to add product to cart
        function addToCart(product) {
            cart.push(product); // Add product to cart
            alert(`${product.querySelector('h3').innerText} has been added to your cart.`);
            hideAllProducts(); // Hide all products after adding to cart
        }

        // Function to hide all products
        function hideAllProducts() {
            products.forEach(product => {
                product.classList.remove('visible'); // Hide all products
            });
            input.value = ''; // Clear the search input
        }

        // Attach the input event listener to the search input
        input.addEventListener('input', filterProducts);

        // Example of adding event listeners to add-to-cart buttons
        products.forEach(product => {
            const addToCartButton = product.querySelector('.add-to-cart'); // Assuming each product has a button with this class
            if (addToCartButton) {
                addToCartButton.addEventListener('click', function() {
                    addToCart(product); // Call addToCart function with the current product
                });
            }
        });
    });
</script>
</body>
</html>
