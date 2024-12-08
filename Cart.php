<?php
session_start();

// Simulate a logged-in user for testing
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1;  // Manually set a user_id for testing purposes
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freshscent_db";

//USE FRESHSCENT_db;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Fetch cart items from the database
$cart_items = [];
$query = "SELECT ci.* FROM cart_items ci JOIN Shopping_Cart sc ON ci.cart_id = sc.cart_id WHERE sc.user_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}
$stmt->close();

function calculateTotalAmount($cart_items) {
    $total = 0;
    foreach ($cart_items as $item) {
        $total += $item['quantity'] * $item['price'];
    }
    return $total;
}

$total_amount = calculateTotalAmount($cart_items);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $card_number = isset($_POST['card-number']) ? $_POST['card-number'] : '';
    $expiry_date = isset($_POST['expiry-date']) ? $_POST['expiry-date'] : '';
    $card_type = "VISA";

    // Convert expiry date from MM/YY to YYYY-MM-31 ensuring year between 2024 and 3000
    if (!empty($expiry_date) && preg_match('/(0[1-9]|1[0-2])\/\d{2}/', $expiry_date)) {
        $expiry_parts = explode('/', $expiry_date);
        $month = $expiry_parts[0];
        $year = "20" . $expiry_parts[1];

        // Ensure year is between 2024 and 3000
        if ($year < 2024) {
            $year = 2024;
        } elseif ($year > 3000) {
            $year = 3000;
        }
        
        $expiry_date = sprintf('%s-%s-31', $year, $month);
    } else {
        $expiry_date = '2024-12-31';  // Default to 2024-12-31 if invalid
    }

    // Debug statements to check values
    //echo "user_id: $user_id<br>";
    //echo "card_number: $card_number<br>";
    //echo "card_type: $card_type<br>";
    //echo "expiry_date: $expiry_date<br>";

    // Insert Order
    $order_sql = "INSERT INTO Orders (user_id, total_amount) VALUES (?, ?)";
    $stmt = $conn->prepare($order_sql);
    $stmt->bind_param("id", $user_id, $total_amount);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    foreach ($cart_items as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];
        $price = $item['price'];

        $order_item_sql = "INSERT INTO Order_Items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($order_item_sql);
        $stmt->bind_param("iiid", $order_id, $product_id, $quantity, $price);
        $stmt->execute();
    }

    // Insert Payment Method
    $payment_sql = "INSERT INTO Payment_Methods (user_id, card_number, card_type, expiration_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($payment_sql);
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param("isss", $user_id, $card_number, $card_type, $expiry_date);
    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FreshScents | Cart</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Cart.css">
    <style>
        footer {
            background-color: #AFE1AF;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>

<header>
    <div class="navbar">
    <a href="Home Page.php" class="logo">
    <img  src="FR  SHSCENT.jpg"  width="200px" height="90px">
  </a>
        </div>
        <nav>
            <ul>
                <li><a href="Home Page.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="ContactUs.php">Contact</a></li>
                <li><a href="Cart.php"><img src="shopping bag.jpg" width="30px" height="30px" alt="Shopping Cart"></a></li>
            </ul>
        </nav>
    </div>
</header>

<section class="cart-section">
    <h1>Your Shopping Cart</h1>
    <div id="cart-items" class="cart-items">
        <?php if (empty($cart_items)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($cart_items as $item): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($item['name']); ?></strong> - 
                        Quantity: <?php echo htmlspecialchars($item['quantity']); ?> - 
                        Price: $<?php echo htmlspecialchars($item['price']); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <div class="checkout-process">
        <h2>Checkout</h2>
        <div class="checkout-step">
            <h3>Step 1: Review Items</h3>
            <p>Ensure all your items are correct.</p>
        </div>
        <div class="checkout-step">
            <h3>Step 2: Payment Information</h3>
            <form id="payment-form" method="post">
                <label for="card-number">Card Number</label>
                <input type="text" id="card-number" name="card-number" required maxlength="14" pattern="\d{14}" placeholder="Enter 14-digit card number">
                
                <label for="expiry-date">Expiry Date</label>
                <input type="text" id="expiry-date" name="expiry-date" required pattern="(0[1-9]|1[0-2])\/\d{2}" placeholder="MM/YY">
                
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" required maxlength="3" pattern="\d{3}" placeholder="3-digit CVV">
                
                <button type="submit" onclick="processPayment()">Confirm Payment</button>
            </form>
        </div>
        <div id="confirmation-message"></div>
    </div>

    <script>
        function processPayment() {
            const cardNumber = document.getElementById('card-number');
            const expiryDate = document.getElementById('expiry-date');
            const cvv = document.getElementById('cvv');
            
            if (!cardNumber.checkValidity()) {
                alert('Please enter a valid 14-digit card number.');
                return;
            }

            if (!expiryDate.checkValidity()) {
                alert('Please enter a valid expiry date in MM/YY format.');
                return;
            }

            if (!cvv.checkValidity()) {
                alert('Please enter a valid 3-digit CVV.');
                return;
            }

            alert('Payment processed successfully!');
            document.getElementById('confirmation-message').innerText = 'Payment confirmed!';
        }
    </script>
</section>

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

<script src="cart.js"></script>
</body>
</html>