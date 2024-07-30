<?php
// index.php

echo '<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .employee-details {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .employee-details h2 {
            color: #333;
            margin-bottom: 10px;
        }
        .employee-details p {
            margin-bottom: 5px;
        }
        .employee-details p strong {
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
</head>
<body>';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Include database connection
    include '../connection/connect.php';

    // Sanitize input to prevent SQL injection
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE Employee_ID = ?";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // "i" indicates integer type
    
    // Execute the statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Output data of each row
        echo '<div class="employee-details">';
        while($row = $result->fetch_assoc()) {
            echo "<h2>Employee Details</h2>";
            echo "<p><strong>ID:</strong> " . $row["Employee_ID"]. "</p>";
            echo "<p><strong>Name:</strong> " . $row["First_Name"]. "</p>";
            echo "<p><strong>Surname:</strong> " . $row["Last_Name"]. "</p>";
            echo "<p><strong>Position:</strong> " . $row["Position"]. "</p>";
            echo "<p><strong>Email:</strong> " . $row["Email_Address"]. "</p>";
            echo "<p><strong>Phone:</strong> " . $row["Phone"]. "</p>";
            echo "<p><strong>Address:</strong> " . $row["Address"]. "</p>";
            echo "<p><strong>Salary:</strong> " . $row["Salary"]. "</p>"; // Corrected typo in "salary"
            // Add more fields as needed
        }
        echo '</div>'; // Close employee-details div
    } else {
        echo "<p>No results found for ID: $id</p>";
    }
    
    // Close the statement
    $stmt->close();
    // Close the connection
    $conn->close();
} else {
    // Display message if no ID is provided or upon initial load
    echo "<p>Enter an Employee ID above to view details.</p>";
}

echo '</body>
</html>';
?>
