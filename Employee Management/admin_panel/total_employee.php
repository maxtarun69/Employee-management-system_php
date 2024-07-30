<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Total Employees</title>
</head>
<body>

<?php
// Database connection
include '../connection/connect.php';
// SQL query to get total number of employees
$sql = "SELECT COUNT(*) AS total_employees FROM employees"; // Assuming 'employees' is your table name

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Total Employees: " . $row["total_employees"];
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

</body>
</html>
