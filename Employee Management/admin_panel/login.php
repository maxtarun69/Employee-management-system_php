<?php
// Include the database connection details

include '../connection/connect.php';
// Initialize response array
$response = array();

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT Username, password FROM admin WHERE Username = ?");
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($username, $stored_password);
            $stmt->fetch();

            // Verify password
            if ($password === $stored_password) {
                // Password is correct, redirect to a success page
                $response['success'] = true;
            } else {
                $response['error'] = "Incorrect password.";
            }
        } else {
            $response['error'] = "Username not found.";
        }
    } else {
        $response['error'] = "Error during login: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();

// Send response as JSON
echo json_encode($response);
?>
