<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="../css/user.css">

</head>
<body>
    <?php include 'header.php'; ?>

        <div class="employee-details">
            <div class="form-container">
                <form method="GET" action="index.php">
                    <label for="empId">Enter Employee ID:</label>
                    <input type="text" id="empId" name="id" required>
                    <input type="submit" value="View Details">
                </form>
            </div>
    </div>

</body>
</html>
