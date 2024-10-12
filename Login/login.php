<?php
// Start the session
session_start();

// Assuming you have a database connection
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

    // Perform a query to check credentials and user status
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if ($row["Status"] == "Waiting Approval") {
            echo '<script>alert("User is waiting for Approval, contact Admin");';
            echo 'window.location.href = "index.html";</script>';
            exit();
        } else if($row["Status"] == "Not Approved"){
            echo '<script>alert("User is not Approved, contact Admin");';
            echo 'window.location.href = "index.html";</script>';
            exit();
        } else {
            // Valid credentials, set session variables
            $_SESSION["authenticated"] = true;
            $_SESSION["username"] = $username;
            header("Location: ./autorent");
            exit();
        }
    } else {
        echo '<script>alert("Invalid Credentials");';
        echo 'window.location.href = "index.html";</script>';
        exit();
    }
}

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) {
    header("Location: index.php");
    exit();
}

$conn->close();
?>
