<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    
}

h1 {
    color: #333;
    margin-top:20px;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    width: 50%;
    margin: auto;
    margin-top:20px
}

label {
    font-weight: bold;
}

input[type="number"], textarea {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
        <script>
            alert('Task added successfully.');
        </script>
<?php include 'header.php'; ?>
    <h1 align=center>Add Task</h1>
    <form action="task.php" method="post">
        <label for="employee_id">Employee ID:</label><br>
        <input type="number" id="employee_id" name="employee_id" required><br><br>
        
        <label for="task">Task:</label><br>
        <textarea id="task" name="task" rows="4" cols="50" required></textarea><br><br>
        
        <input type="submit" value="Add Task">
    </form>
</body>
</html>
<?php include 'footer.php';?>