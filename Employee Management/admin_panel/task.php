<?php
// Database credentials
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "users"; // Replace with your MySQL database name

try {
    // Connect to MySQL database using PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Retrieve data from HTML form
    $employee_id = $_POST['employee_id']; // Employee ID from the form
    $task = $_POST['task']; // Task description from the form
    
    // SQL prepared statement to insert data into tasklist table
    $sql = "INSERT INTO tasklist (employee_id, task) VALUES (:employee_id, :task)";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to prepared statement
    $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
    $stmt->bindParam(':task', $task, PDO::PARAM_STR);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Redirect to the add_task.php page with a success message
    header("Location: add_task.php?status=success");
    exit();
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
}

// Close connection
$pdo = null;
?>
