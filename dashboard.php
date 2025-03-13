<?php
session_start(); // Start session

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="script.js"></script>
    <meta content=" " description=" ">
    <title>StonePath Estates</title>
</head>
<body>
    
    <!-- NAV AND BANNER SECTION -->
    <div id="nav-banner">
        <!-- this is the nav placeholder -->
            <div id="nav-placeholder"></div>

        <!-- Banner section -->
        <div id="banner">
             <!-- content -->
            <div class="banner-text">
                <h1 title="StonePath Estates">Welcome to StonePath Estates</h1>
                <p>
                    We are a team dedicated to finding you the best properties
                    <br>
                    At the best deals around town!
                </p>

                <div class="buttons">
                    <a href="services.html" class="btn primary">Looking to buy a house</a>
                    <br>
                    <a href="services.html" class="btn secondary">Looking to rent</a>
                </div>
            </div>
              <!-- end of content -->
        </div>
    </div>
     <!-- END OF NAV AND BANNER SECTION -->


     <h3 class="h3-services"><br>ABOUT US</h3>


     <!-- ABOUT ME SECTION -->
      <div id="about-me">
        <div class="about-me-mother">
            <div class="child-about-me">
                <img src="images/download (8).jpeg" alt="">
            </div>
            <div class="child-about-me">
                <h3>About US</h3>
                <p>
                    Hey there! we are a group of passionate computer science students with hands-on experience in software development and Embedded systems/Electronics engineering. 
                    <br>
                    <br>
                    Currently, we are working on building our skills and expanding our knowledge, focusing on areas like web development, application development, and embedded systems.
                    <br>
                    <br>
                     When we are not coding, you can find us either working on personal projects, experimenting with new tech, or hitting the gym to build muscle and stay active.
                    <br>
                    <br>
                     We are always open to new opportunities, collaborations, and ways to learn and grow in the tech world. Feel free to get in touch if you want to connect!
                </p>
                <br>
                <br>
                <br>
                <a href="#">Get a home now</a>
            </div>
      </div>
    </div>
     <!-- END OF ABOUT ME SECTION -->

      <h3 class="h3-services"><br>SERVICES</h3>

     <!-- SERVICES SECTION -->
      <div id="services">
        <div class="services-mother">
            <div class="services-child">
                <a href="services.html"><img src="images/h11.jpeg" alt="HOUSE 1"></a>
                <h4><a href="services.html">Buy a plot of land</a></h4>
            </div>
            <div class="services-child">
                <a href="services.html"><img src="images/h3.jpeg" alt=""></a>
                <h4><a href="services.html">Buy a house</a></h4>
            </div>
            <div class="services-child">
                <a href="services.html"><img src="images/h8.jpeg" alt=""></a>
                <h4><a href="services.html">Rent a house</a></h4>
            </div>
        </div>
      </div>
     <!-- END OF SERVICES SECTION -->

    <!-- This is the footer placeholder -->
     <div id="footer-placeholder"></div>

</body>
</html>