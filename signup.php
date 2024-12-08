<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 // Database connection parameters
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "FRESHSCENT_db"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $checkEmailStmt = $conn->prepare("SELECT * FROM Users WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $result = $checkEmailStmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Error: Email already exists. Please use a different email.');</script>";
    } else {
        // Insert the new user
        $stmt = $conn->prepare("INSERT INTO Users (first_name, last_name, email, password_hash) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $password_hash);

        if ($stmt->execute()) {
            // Registration successful, redirect to home page
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error; // Handle error if insertion fails
        }
        $stmt->close();
    }
    $checkEmailStmt->close();
    $conn->close();
}
?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login | Fresh Scents</title>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <!-- External CSS -->
    <style>
        /* Background image and container styling */
        body {
            margin: 0;
            padding: 0;
            background-image: url('wallpaper.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            width: 350px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            margin: 100px auto;
            text-align: center;
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

        .or {
            margin: 20px 0;
            font-size: 14px;
            color: #333;
        }

        .icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        p {
            color: #000;
        }

        .icons i {
            color: #333;
            cursor: pointer;
            font-size: 20px;
        }

        .icons i:hover {
            color: #4CAF50;
        }

        #signInButton {
            background-color: #f1f1f1;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #signInButton:hover {
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
            const first_name = document.gethostname('first_name').value;
            const last_name = document.getElementById('last_name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Check if all fields are filled
            if (first_name && last_name && email && password) {
                // If all fields are filled, redirect to home page
                window.location.href = 'Home Page.php'; // Update to .php if your home page is a PHP file
            } else {
                if (!first_name || !last_name || !email || !password) {
    alert("Please fill out all fields before signing up.");
    return false; // Prevent form submission
}

                // Alert user if fields are missing
                alert("Please fill out all fields before signing in.");
            }
        }
    </script> 
</head>
<body>

    <div class="container" id="signup">
        <h1 class="form-title">Register</h1>
        <form method="post" action="" onsubmit="return validateForm()">
    <div class="input-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
    </div>
    <div class="input-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" placeholder="Last Name" required>
    </div>
    <div class="input-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" required>
    </div>
    <div class="input-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required>
    </div>
    <input type="submit" class="btn" value="Sign Up">
</form>

        
        <p class="or">--------------OR--------------</p>

        <div class="icons">
            <a href="https://myaccount.google.com/email"><img src="google.png" width="27px" height="30px"></a>
            <a href="https://www.facebook.com/login.php/"><img src="facebook.jpeg" width="35px" height="30px"></a>
        </div>
        <div class="icons">
            <p>Already have an account?</p>
            <a href="login.php"><button id="signInButton">Sign In</button></a>
        </div>
    </div>

    <!-- External JS script (if needed) -->
     <script src="script.js"></script> 
</body>
</html>