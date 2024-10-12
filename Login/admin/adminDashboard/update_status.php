<?php
// Database connection parameters
$servername = "localhost";
$dbuser = "u645387238_rico";
$password = "2468g0a7A7B7*";
$dbname = "u645387238_carrent";

// Create connection
$conn = new mysqli($servername, $dbuser, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $status = $_POST['status'];

    // Assuming your table name is "User" and the column for status is "Status"
    $sql = "UPDATE user SET Status = '$status' WHERE username = '$username'";

    if (mysqli_query($conn, $sql)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // Handle invalid request method
    echo "Invalid request method";
}
?>