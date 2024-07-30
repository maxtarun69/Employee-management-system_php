<?php
include 'header.php'; // Ensure header is included properly
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-U/S7K0l9rv3rQQ1Ta5oOSAaDyBodzW+hA25iF7yn49RdqZM1s0Q6lvTXvgyvB8qBbhB3czYnnnL8vAqOiK+BfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    <div class="container">
        <ul>
            <li><a href="profile.php"><i class="fas fa-user"></i> View Profile</a></li>
            <li><a href="view_task.php"><i class="fas fa-tasks"></i> View Task</a></li>
            <li><a href="leave_application.php"><i class="fas fa-envelope"></i> Leave Application</a></li>
            <li><a href="view_atandance.php"><i class="fas fa-calendar-check"></i> View Attendance</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Reports</a></li>
        </ul>
    </div>

    <?php
    include 'footer.php'; // Ensure footer is included properly
    ?>
</body>
</html>
