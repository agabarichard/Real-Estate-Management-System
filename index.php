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
    <div id="nav_signup-placeholder"></div>

    <!-- Login box -->
    <div class="mother-container">
        <div class="container">
            <div class="login-box">
                <h2>Login</h2>
                <form action="login.php" method="POST">
                    <div class="input-field">
                        <label for="username">Username: </label>
                        <input type="text" id="username" name="username" placeholder="john@example.com"  required>
                    </div>
                    <div class="input-field">
                        <label for="password">Password: </label>
                        <input type="password" id="password" name="password" placeholder="********" required>
                    </div>
                    <button type="submit" class="btn">Login</button>
                    <p class="switch-page">Don't have an account? <a href="signup.html">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
    <!-- End of login box -->
</body>
</html>
