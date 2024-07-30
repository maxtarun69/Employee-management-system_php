<?php
include '../connection/connect.php';

// Function to generate a 6-digit random ID
function generateEmployeeID() {
    return mt_rand(100000, 999999); // Generates a random number between 100000 and 999999
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $firstName = $_POST['First_Name'];
    $lastName = $_POST['Last_Name'];
    $email = $_POST['Email_Address'];
    $address = $_POST['Address'];
    $position = $_POST['Position'];
    $salary = $_POST['Salary'];
    $startDate = $_POST['StartDate'];
    $phone = $_POST['Phone'];
    $fax = $_POST['Fax'];

    // Generate 6-digit employee ID
    $employeeID = generateEmployeeID();

    // SQL insert statement
    $sql = "INSERT INTO employees (Employee_ID, First_Name, Last_Name, Email_Address, Address, Position, Salary, StartDate, Phone, Fax)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssdsss", $employeeID, $firstName, $lastName, $email, $address, $position, $salary, $startDate, $phone, $fax);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect with success message
        header("Location: add_employee.php?success=1");
        exit();
    } else {
        // Redirect with error message
        header("Location: add_employee.php?success=0");
        exit();
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
