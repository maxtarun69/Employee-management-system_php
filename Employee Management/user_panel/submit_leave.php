<?php
include '../connection/connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $employeeName = $_POST['employeeName'];
    $leaveType = $_POST['leaveType'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $reason = $_POST['reason'];

    // Prepare SQL statement to insert leave request into database
    $stmt = $conn->prepare("INSERT INTO leave_requests (employee_name, leave_type, start_date, end_date, reason) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $employeeName, $leaveType, $startDate, $endDate, $reason);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a thank you page or show a success message
        header('Location: thankyou.html');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
