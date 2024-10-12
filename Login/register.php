<?php

$servername = "localhost";
$username = "u645387238_rico";
$password = "2468g0a7A7B7*";
$dbname = "u645387238_carrent";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $whatsapp_number = mysqli_real_escape_string($connection, $_POST["whatsapp_number"]); // Add this line

    // Check for duplicate username or email
    $checkQuery = "SELECT * FROM register WHERE username = '$username' OR email = '$email'";
    $result = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username or email already exists. Please choose a different one.');</script>";
    } else {
        // File upload handling
        $nationalID = "ktp_image.jpg";
        $driverLicense = "driver_license.jpg"; // Change filename for national ID
        $insuranceImage = "insurance_image.jpg"; // Change filename for driver's license

        // Create a directory for the user based on their username
        $userDirectory = "uploads/" . $username . "/";
        if (!file_exists($userDirectory)) {
            mkdir($userDirectory, 0777, true);
        }

        // Move uploaded files to the user's directory
        move_uploaded_file($_FILES["national_id"]["tmp_name"], $userDirectory . $nationalID);
        move_uploaded_file($_FILES["driver_license"]["tmp_name"], $userDirectory . $driverLicense);
        move_uploaded_file($_FILES["insurance_image"]["tmp_name"], $userDirectory . $insuranceImage);

        // Insert data into the "register" table
        $insertQuery = "INSERT INTO register (username, email, password, whatsapp_number, national_id, driver_license, insurance_image) 
                       VALUES ('$username', '$email', '$password', '$whatsapp_number', ' $nationalID', '$driverLicense', '$insuranceImage')"; // Update this line

        if (mysqli_query($connection, $insertQuery)) {
            // Insert data into the "user" table
            $insertUserQuery = "INSERT INTO user (username, password, Status) VALUES ('$username', '$password', 'Waiting Approval')";
            mysqli_query($connection, $insertUserQuery);

            echo "<script>alert('Registration successful!'); window.location.href='index.html';</script>";
        } else {
            echo "<script>alert('Error: " . $insertQuery . "\\n" . mysqli_error($connection) . "');</script>";
        }
    }

    // Close the database connection
    mysqli_close($connection);
}

?>
