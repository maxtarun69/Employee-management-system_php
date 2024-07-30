<?php
include '../connection/connect.php';
// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['employeeId'])) {
    $employeeId = $_POST['employeeId'];
    
    // SQL query to delete employee from the database
    $sql = "DELETE FROM employees WHERE Employee_ID = '$employeeId'";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the profiledata.php with success parameter
        header("Location: employee_profile.php");
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
