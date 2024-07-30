<?php
// Include the database connection file
include '../connection/connect.php';


if(isset($_POST['employeeId'])) {
    $employeeId = $_POST['employeeId'];
    // SQL query to update the status of the employee to inactive
    $sql = "UPDATE employees SET Status = 0 WHERE Employee_ID = $employeeId";
    // Executing the query
    if ($conn->query($sql) === TRUE) {
        // Redirecting to employee_profile.php upon success
        echo "<script>window.location = 'employee_profile.php';</script>";
    } else {
        // Displaying error if query execution fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Handling case where employeeId is not provided via POST
    echo "Employee ID not provided!";
}

