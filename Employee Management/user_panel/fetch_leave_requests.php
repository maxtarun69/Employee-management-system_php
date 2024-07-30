<?php
include '../connection/connect.php';

// Prepare SQL statement to fetch leave requests
$sql = "SELECT employee_name, leave_type, start_date, end_date, reason, status FROM leave_requests";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch rows as associative array
    $leaveRequests = array();
    while ($row = $result->fetch_assoc()) {
        $leaveRequests[] = $row;
    }
    // Output data as JSON
    echo json_encode($leaveRequests);
} else {
    echo "No leave requests found.";
}

$conn->close();
?>
