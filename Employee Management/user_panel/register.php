<?php

// Include the database connection details

// Database configuration
$servername = "localhost"; // Replace with your server name or IP address
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "users"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO register (username,  contact, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $contact, $email,$password);

    // Check for errors in query preparation
    if (!$stmt) {
        die("Error in query preparation: " . $conn->error);
    }

    if ($stmt->execute()) {
        // Redirect to index.html using JavaScript upon successful registration
        echo "<script>window.location = 'user_login.html';</script>";
        exit(); // Ensure that no code is executed after the redirection.
    } else {
        echo "Error during registration: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>
