<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoRent Login/Register Page</title>
    <link rel="icon" type="image/svg+xml" href="../autorentbatam.png" />
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body data-aos="zoom-in">

    <!-- Navigation Bar -->

    <header>
        <nav class="navbar">
            <a href="https://autorentbatam.com/" class="logo">
                <img src="assets/images/logo.png" alt="logo">
            </a>
        </nav>
    </header>

    <!-- Navigation Bar -->

    <!-- Form Popup -->
    <div class="form-popup">
        <div class="form-box login">
            <div class="form-details">
                <h2>Welcome</h2>
                <p>Please Log in Using Correct Credentials</p>
            </div>
            <div class="form-content">
                <h2>ADMIN LOGIN</h2>
                <!-- Update the form action and method -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
                    <div class="input-field">
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" id="password" required>
                        <label>Password</label>
                        <span class="toggle-password" onclick="togglePasswordVisibility()">👁</span>
                    </div>
                    <!-- Add the Remember me checkbox -->
                    <div class="policy-text" style="margin-top: 10px;">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Remember me</label>
                    </div>
                    <button type="submit">Log in</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Form Popup -->

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        function validateForm() {
            var policyCheckbox = document.getElementById("policy");
        
            if (!policyCheckbox.checked) {
                alert("Please agree to the Terms & Conditions");
                return false;
            }
        
            return true;
        }

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.querySelector(".toggle-password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.textContent = "👁️";
            } else {
                passwordInput.type = "password";
                toggleIcon.textContent = "🔒";
            }
        }
    </script>

    <?php
    // Start the session
    session_start();

    // Assuming you have a database connection
    // Replace the database credentials and connection logic accordingly
    $servername = "localhost";
    $username = "u645387238_rico";
    $password = "2468g0a7A7B7*";
    $dbname = "u645387238_carrent";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Perform a simple query to check credentials
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Valid credentials, set a session variable and optionally set a cookie
            $_SESSION["authenticated"] = true;
            
            // Check if "Remember me" is checked
            if (isset($_POST["remember"]) && $_POST["remember"] == "on") {
                // Set a cookie to remember the authentication
                setcookie("admin_auth", true, time() + (86400 * 30), "/"); // Cookie will expire in 30 days
            }
            
            header("Location: adminDashboard/index.php");
            exit();
        } else {
            // Invalid credentials, show a popup and redirect back to the login page
            echo '<script>alert("Invalid Credentials");';
            echo 'window.location.href = "index.php";</script>';
            exit();
        }
    }

    // Check if the user is already authenticated via session or cookie and redirect if necessary
    if ((isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) || isset($_COOKIE["admin_auth"])) {
        header("Location: adminDashboard/index.php");
        exit();
    }

    $conn->close();
    ?>
</body>
</html>
