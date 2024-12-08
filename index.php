<?php
// You can add any PHP code here if needed, for example, session management, etc.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FreshScents | Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-image: url('Better Life.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Roboto', sans-serif;
            color: #fff;
            padding-bottom: 60px; /* Space for the footer */
        }

        .header {
            background: #AFE1AF; /* Header color */
            padding: 20px;
            text-align: center;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1300px;
            margin: auto;
        }

        .logo img {
            width: 200px;
            height: 90px;
        }

        nav {
            flex: 1;
            text-align: right;
        }

        nav ul {
            display: inline-block;
            list-style-type: none;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        a {
            text-decoration: none;
            color: #333; 
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            width: 350px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            margin: 100px auto;
            text-align: center;
            color: #333;
        }

        .btn {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-bottom: 20px;
        }

        #logInButton, #signUpButton {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #logInButton:hover,
        #signUpButton:hover {
            opacity: 0.8;
        }

        footer {
            background-color: #AFE1AF; /* Same color as the header */
            color: #000000;
			Position: bottom;
			bottom: 0;
			left: 0;
			right: 0;
            text-align: center;
            padding: 10px 0;
            margin-top: 0px; /* Add space above the footer */
        }

        /* About Us content styling */
        .about-us {
            display: none; /* Initially hidden */
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            margin: 20px auto;
            max-width: 800px;
            color: #333;
        }
		.about-us, .contact_us_6 {
    display: none; /* Initially hidden */
}

    </style>
    <script>
    function toggleAboutUs() {
    const aboutUsSection = document.getElementById('aboutUs');
    const contactUsSection = document.getElementById('contactUs');
    aboutUsSection.style.display = aboutUsSection.style.display === 'none' || aboutUsSection.style.display === '' ? 'block' : 'none';
    contactUsSection.style.display = 'none';
}

function toggleContactUs() {
    const contactUsSection = document.getElementById('contactUs');
    const aboutUsSection = document.getElementById('aboutUs');
    contactUsSection.style.display = contactUsSection.style.display === 'none' || contactUsSection.style.display === '' ? 'block' : 'none';
    aboutUsSection.style.display = 'none';
}



</script>
</head>
<body>
    <div class="header">
        <div class="navbar">
            <div class="logo">
                <img src="FR  SHSCENT.jpg" alt="FreshScents Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="javascript:void(0);" onclick="toggleAboutUs()">About Us</a></li>
                    <li><a href="javascript:void(0);" onclick="toggleContactUs()">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="container">
 <h1>Welcome to FreshScent</h1>
        <p>Your destination for sustainable, chemical-free cosmetics.</p>

		<br><br>
        <div class="btn">
		<a href="login.php"><button id="logInButton">Log In</button></a>
            <a href="signup.php"><button id="signUpButton">Sign Up</button></a>

        </div>
    </div>

    <div id="aboutUs" class="about-us">
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
    </div>
	<div id="contactUs" class="contact_us_6" style="display: none;">
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


		<br>
    <footer>
        <p>&copy; 2023 FreshScent. All rights reserved.</p>
    </footer>
</body>
</html>