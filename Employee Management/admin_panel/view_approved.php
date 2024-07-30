<?php
// Database connection configuration
include '../connection/connect.php';
// Query to select approved leave requests
$sql = "SELECT id, employee_name, start_date, end_date FROM leave_requests WHERE status = 'Approved'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Leave Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            margin-top:10px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        .leave-request {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .leave-request p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h2>Approved Leave Requests</h2>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="leave-request">
                    <p><strong>ID:</strong> <?php echo $row["id"]; ?></p>
                    <p><strong>Employee Name:</strong> <?php echo $row["employee_name"]; ?></p>
                    <p><strong>Start Date:</strong> <?php echo $row["start_date"]; ?></p>
                    <p><strong>End Date:</strong> <?php echo $row["end_date"]; ?></p>
                </div>
                <?php
            }
        } else {
            echo "<p>No approved leave requests found</p>";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
<?php include 'footer.php';?>