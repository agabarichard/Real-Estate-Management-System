<?php
session_start(); // Start the session to check login status

// If the user is logged in, display the logout link
$logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <script defer src="script.js"></script>
    <meta content=" " description=" ">
    <title>Nav section</title>
</head>
<body>

    <!-- NAV SECTION -->
    <nav>
        <!-- Left-aligned item -->
        <div class="left-nav">
            <a href="dashboard.php">StonePath Estates</a>
        </div>

        <!-- Right-aligned items -->
        <div class="right-nav">
            <a href="dashboard.php">INTERIOR DESIGN</a>
            <a href="services.html">SERVICES</a>
            <a href="contact.html">CONTACT-US</a>

            <?php if ($logged_in): ?>
                <a href="logout.php">LOGOUT</a>
            <?php endif; ?>
        </div>
    </nav>
    <!-- END OF NAV SECTION -->

</body>
</html>
