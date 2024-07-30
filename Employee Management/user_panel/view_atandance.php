<?php
    include 'header.php'; // Ensure footer is included properly
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link rel="stylesheet" href="../css/user.css">
    <style>
     
    </style>
</head>
<body>
    <div class="container-4">
        <h2>Employee Attendance Records</h2>

        <!-- Employee ID Form -->
        <form method="post">
            <div class="form-group">
                <label for="employee_id">Enter Employee ID:</label>
                <input type="text" id="employee_id" name="employee_id" required>
            </div>
            <div class="form-group">
                <button type="submit" class="button">View Attendance</button>
            </div>
        </form>

        <?php
       include '../connection/connect.php';
        // Fetch attendance records for a specific employee ID
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $employee_id = $_POST['employee_id'];
            $sql = "SELECT id, employee_id, attendance_date, status FROM attendance WHERE employee_id = '$employee_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<table>
                        <tr>
                            <th>ID</th>
                            <th>Employee ID</th>
                            <th>Attendance Date</th>
                            <th>Status</th>
                        </tr>';
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$row["employee_id"]."</td>
                            <td>".$row["attendance_date"]."</td>
                            <td>".$row["status"]."</td>
                        </tr>";
                }
                echo '</table>';
            } else {
                echo '<p>No attendance records found for employee ID: '.$employee_id.'</p>';
            }
        }

        $conn->close();
        ?>
        <p><a href="emp_dash.php" class="button" style="background:gray; margin-top:10%;"> < Back to Home</a></p>
    </div>
</body>
</html>
<?php
    include 'footer.php'; // Ensure footer is included properly
?>