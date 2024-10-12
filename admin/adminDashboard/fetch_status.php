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

// Fetch status for each user from the database
$sql = "SELECT username, Status FROM user";
$result = $conn->query($sql);

$statusData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $statusData[] = $row;
    }
}

// Close database connection
$conn->close();

// Return status data as JSON
header('Content-Type: application/json');
echo json_encode($statusData);
?>
