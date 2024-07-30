<?php
// Handle delete leave request action
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requestData = json_decode(file_get_contents('php://input'));

    include '../connection/connect.php';
    $id = $conn->real_escape_string($requestData->id);

    // Delete leave request from database
    $sql = "DELETE FROM leave_requests WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        http_response_code(200); // Success
    } else {
        http_response_code(500); // Server error
    }

    $conn->close();
} else {
    http_response_code(405); // Method Not Allowed
}
?>
