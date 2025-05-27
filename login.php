<?php
session_start(); // Start the session

// Database connection
include './includes/connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $username_or_email = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Check if user exists (allow login via email or username)
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username_or_email, $username_or_email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $username, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Store session data
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;

            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            // Invalid password
            $_SESSION['error_message'] = "Invalid username/email or password.";
        }
    } else {
        // User not found
        $_SESSION['error_message'] = "Invalid username/email or password.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <script defer src="script.js"></script>
    <title>Login</title>
</head>
<body>
    <!-- Placeholder for the nav panel -->
    <div id="nav-placeholder"></div>

    <!-- Login box -->
    <div class="mother-container">
        <div class="container">
            <div class="login-box">
                <h2>Login</h2>
                <form action="login.php" method="POST">
                    <div class="input-field">
                        <label for="username">Username: </label>
                        <input type="text" id="username" name="username" placeholder="john@example.com" required>
                    </div>
                    <div class="input-field">
                        <label for="password">Password: </label>
                        <input type="password" id="password" name="password" placeholder="********" required>
                    </div>
                    <button type="submit" class="btn">Login</button>
                    <p class="switch-page">Don't have an account? <a href="signup.html">Sign Up</a></p>
                </form>

                <?php
                // Display error message if available
                if (isset($_SESSION['error_message'])) {
                    echo "<p class='error' style' color: red;'>" . $_SESSION['error_message'] . "</p>";
                    // Clear the error message after it is displayed
                    unset($_SESSION['error_message']);
                }
                ?>
            </div>
        </div>
    </div>
    <!-- End of login box -->

</body>
</html>
