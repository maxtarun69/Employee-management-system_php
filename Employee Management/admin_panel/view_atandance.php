<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;

        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top:20px
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        .success {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        button {
            background-color: #4CAF50; /* Green background */
            border: none; /* Remove border */
            color: white; /* White text color */
            padding: 15px 32px; /* Top and bottom padding, left and right padding */
            text-align: center; /* Center text alignment */
            text-decoration: none; /* Remove underline from text */
            display: inline-block; /* Allow setting width and height */
            font-size: 16px; /* Set font size */
            margin: 4px 2px; /* Margin around the button */
            cursor: pointer; /* Change cursor on hover */
            border-radius: 8px; /* Rounded corners */
            transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transition effects */
        }

        /* Button hover effect */
        button:hover {
            background-color: #45a049; /* Slightly darker green */
            transform: scale(1.05); /* Slightly enlarge the button on hover */
        }

        /* Button focus effect */
        button:focus {
            outline: none; /* Remove outline */
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2); /* Add shadow for focus */
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h2>Employee Attendance Records</h2>

        <!-- Employee ID Form -->
        <form method="post">
            <div class="form-group">
                <label for="employee_id">Enter Employee ID:</label>
                <input type="text" id="employee_id" name="employee_id" required>
            </div>
            <div class="form-group">
                <button type="submit">View Attendance</button>
            </div>
        </form>

        <?php
        // Database connection parameters
        include '../connection/connect.php';
        // Delete attendance record if delete request is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['delete_id'])) {
                $delete_id = $_POST['delete_id'];
                $sql_delete = "DELETE FROM attendance WHERE id = '$delete_id'";
                if ($conn->query($sql_delete) === TRUE) {
                    echo '<p class="success">Attendance record deleted successfully.</p>';
                } else {
                    echo '<p>Error deleting record: ' . $conn->error . '</p>';
                }
            }

            // Fetch attendance records for a specific employee ID
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
                            <th>Action</th>
                        </tr>';
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$row["employee_id"]."</td>
                            <td>".$row["attendance_date"]."</td>
                            <td>".$row["status"]."</td>
                            <td>
                                <form method='post'>
                                    <input type='hidden' name='delete_id' value='".$row["id"]."'>
                                    <button type='submit' class='delete-btn'>Delete</button>
                                </form>
                            </td>
                        </tr>";
                }
                echo '</table>';
            } else {
                echo '<p>No attendance records found for employee ID: '.$employee_id.'</p>';
            }
        }

        $conn->close();
        ?>

        <p><a href="home.php">Back to Home</a></p>
    </div>
</body>
</html>
<?php include 'footer.php';?>