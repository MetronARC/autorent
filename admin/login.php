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
