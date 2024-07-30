<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Employees</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            
        }
        .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            margin-top:10px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h2>Registered Employees</h2>
        <?php
       include '../connection/connect.php';
        // Fetch all registered users
        $sql = "SELECT username, contact, email FROM register";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Username</th><th>Contact</th><th>Email</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["username"]."</td>";
                echo "<td>".$row["contact"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No registered employees found";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
<?php include 'footer.php';?>