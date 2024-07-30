<?php
// Database connection configuration
include '../connection/connect.php';
// Retrieve leave requests from database
$sql = "SELECT * FROM leave_requests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
} else {
    echo json_encode([]);
}

$conn->close();
?>
