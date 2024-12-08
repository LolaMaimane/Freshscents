<?php
// You can add any PHP code here, for example, session management, etc.

// Database connection parameters
$servername = "localhost";  // Server name
$username = "root";         // Database username
$password = "";             // Database password
$dbname = "freshscent_db";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitize and validate input (example for simple validation)
    if (empty($email) || empty($password)) {
        echo "<script>alert('Please fill out both fields');</script>";
    } else {
        // Check if the user exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // If a user is found
        if ($result->num_rows > 0) {
            // Start session and redirect to home page
            session_start();
            $_SESSION['email'] = $email;
            header("Location: Home Page.php"); // Redirect to HomePage
            exit();
        } else {
            // Show error if credentials are invalid
            echo "<script>alert('Invalid email or password');</script>";
        }

        $stmt->close();
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register & Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	
	<!-- Inline CSS for Background Image -->
	<style>
		body {
			margin: 0;
			padding: 0;
			background-image: url('wallpaper.jpg'); /* Replace with the actual path to your image */
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			background-attachment: fixed;
			font-family: Arial, sans-serif;
			color: #fff;
		}

		.container {
			background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
			width: 350px;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
			margin: 100px auto;
			text-align: center;
			color: #333; /* Ensure text inside is dark for better visibility */
		}

		.form-title {
			color: #333;
		}

		.input-group {
			margin: 15px 0;
			position: relative;
		}

		.input-group i {
			position: absolute;
			top: 10px;
			left: 10px;
			color: #333;
		}

		.input-group input {
			width: calc(100% - 50px);
			padding: 10px 20px 10px 40px;
			border: 1px solid #ccc;
			border-radius: 5px;
			outline: none;
		}

		.input-group input:focus {
			border-color: #4CAF50;
		}

		.btn {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			width: 100%;
			margin-top: 20px;
		}

		.btn:hover {
			background-color: #45a049;
		}

		.recover, .or, .icons p {
			color: #333;
		}

		.icons {
			display: flex;
			justify-content: center;
			gap: 20px;
			margin-bottom: 20px;
		}

		.icons i {
			color: #333;
			cursor: pointer;
			font-size: 20px;
		}

		.icons i:hover {
			color: #4CAF50;
		}

		#signUpButton {
			background-color: #f1f1f1;
			color: #333;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		#signUpButton:hover {
			background-color: #ddd;
		}

		/* Responsive Design */
		@media (max-width: 600px) {
			.container {
				width: 90%;
				margin: 50px auto;
			}
		}
	</style>
	
	<script>
        function validateForm() {
            // Get form fields
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Check if all fields are filled
            if (email && password) {
                // If all fields are filled, redirect to home page
                window.location.href = 'Home Page.php'; // Update to .php if your home page is a PHP file
            } else {
                // Alert user if fields are missing
                alert("Please fill out all fields before signing in.");
            }
        }
    </script>
</head>
<body>

	<div class="container" id="signup">
		<h1 class="form-title">Sign In</h1>
		<form method="post" action="">
			<div class="input-group">
				<i class="fas fa-envelope"></i>
				<input type="email" name="email" id="email" placeholder="Email" required>
				<label for="email ">Email</label>
			</div>
			<div class="input-group">
				<i class="fa fa-lock"></i>
				<input type="password" name="password" id="password" placeholder="Password" required>
				<label for="password">Password</label>
			</div>
			<p class="recover">
				<a href="#">Recover Password</a>
			</p>
			<input type="button" class="btn" value="Sign In" onclick="validateForm()">
		</form>

		<p class="or">--------------OR------------</p>

		<div class="icons">
			<a href="https://myaccount.google.com/email"><img src="google.png" width="27px" height="30px"></a>
			<a href="https://www.facebook.com/login.php/"><img src="facebook.jpeg" width="35px" height="30px"></a>
		</div>
		<div class="icons">
			<p>Don't have an account?</p>
			<a href="signup.php"><button id="signUpButton">Sign Up</button></a>
		</div>
	</div>

</body>
</html>