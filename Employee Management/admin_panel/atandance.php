<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            margin-top:20px;
            overflow: hidden;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label, input, select {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background: #45a049;
        }
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .success {
            background-color: #4CAF50;
            color: white;
        }
        .error {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h1>Employee Attendance</h1>

        <?php
       include '../connection/connect.php';
        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $employee_id = $_POST['employee_id'];
            $attendance_date = $_POST['attendance_date'];
            $status = $_POST['status'];

            // Insert data into database
            $sql = "INSERT INTO attendance (employee_id, attendance_date, status) VALUES ('$employee_id', '$attendance_date', '$status')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="message success">Attendance recorded successfully for Employee ID: ' . $employee_id . ' on ' . $attendance_date . '</div>';
            } else {
                echo '<div class="message error">Error: ' . $sql . '<br>' . $conn->error . '</div>';
            }
        }

        // Close connection
        $conn->close();
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="employee_id">Employee ID:</label>
            <input type="text" id="employee_id" name="employee_id" required>

            <label for="attendance_date">Attendance Date:</label>
            <input type="date" id="attendance_date" name="attendance_date" required>

            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
<?php include 'footer.php';?>