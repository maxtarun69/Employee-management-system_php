<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Employee Management System</title>
</head>
<body>
   
    <header>
        <div class="sidebar-toggle">
            <a href="#" onclick="openSidebar()"><i class="fas fa-bars"></i></a>
        </div>
        <h1>Welcome to the Employee Management System</h1>
    </header>
    
    <nav>
        <ul>
           <li> <a href="home.php"><i class="fas fa-home"></i> / Dashboard</a></li>
           <h2>Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'admin'; ?>!</h2>
        </ul>
    </nav>
    <div id="sidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()">&times;</a>
    <a href="home.php"><i class="fas fa-home"></i> Home</a>
    <a href="add_employee.php"><i class="fas fa-user-plus"></i> Add Employee</a>
    <a href="add_department.php"><i class="fas fa-plus-circle"></i> Change Department</a>
    <a href="add_salary.php"><i class="fas fa-dollar-sign"></i> Change Employee Salary</a>
    <a href="#"><i class="fas fa-chart-bar"></i> Reports</a>
    <div class="submenu">
        <a href="settings.php"><i class="fas fa-cog"></i> Settings</a>
        <div class="sub-links">
            <a href="user_settings.php"><i class="fas fa-user-cog"></i> User Settings</a>
            <a href="delete_account.php"><i class="fas fa-trash-alt"></i> Delete Account</a>
        </div>
    </div>
    <a href="#" onclick="location.href='logout.php'"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

    
    <main>
        
            <!-- Add dashboard content here -->
            <div class="container">
            <img src="../assets/total.png" alt="Employee Icon">
            <a href="employee_profile.php">Total Employees</a>
            <?php
         include '../connection/connect.php';
         // SQL query to get total number of employees
         $sql = "SELECT COUNT(*) AS total_employees FROM employees"; // Assuming 'employees' is your table name

          $result = $conn->query($sql);

         if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p>" . $row["total_employees"] . "</p>";
        }
    } else {
        echo "<p>0</p>";
    }

    // Close connection
    $conn->close();
  ?>
</div>

<div class="container">
  <img src="../assets/leave.png" alt="Leave Icon">
  <a href="view_approved.php">Leave Employees</a>
  <p>10</p>
</div>

<div class="container">
  <img src="../assets/list2.png" alt="Registered Icon">
  <a href="new_registered.php">Newly Registered</a>
  <?php
         include '../connection/connect.php';
         // SQL query to get total number of employees
         $sql = "SELECT COUNT(*) AS total_register FROM register"; // Assuming 'employees' is your table name

          $result = $conn->query($sql);

         if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p>" . $row["total_register"] . "</p>";
        }
    } else {
        echo "<p>0</p>";
    }

    // Close connection
    $conn->close();
  ?>
</div>

<div class="container">
  <img src="../assets/request.png" alt="Request Icon">
  <a href="view_application.php">Leave Requests</a>
  <?php
         include '../connection/connect.php';
         // SQL query to get total number of employees
         $sql = "SELECT COUNT(*) AS total_applications FROM leave_requests"; // Assuming 'employees' is your table name

          $result = $conn->query($sql);

         if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p>" . $row["total_applications"] . "</p>";
        }
    } else {
        echo "<p>0</p>";
    }

    // Close connection
    $conn->close();
  ?>
</div>

<style>.fas.fa-plus {
  font-size: 40px; /* Adjust icon size */
  color:red;
  margin-bottom:10px;
}
</style>
<div class="container">
<i class="fas fa-plus"></i>
  <a href="add_task.php">Add Task</a>
  
</div>

<div class="container">
  <img src="../assets/atandance.jpg" alt="Request Icon">
  <a href="atandance.php">Atandance</a>
  
</div>

<div class="container">
  <img src="../assets/view.jpg" alt="Request Icon">
  <a href="view_atandance.php">View Atandance</a>
  
</div>

<div class="container">
  <img src="../assets/calender.jpg" alt="Request Icon">
  <a href="calender_index.php">Calander</a>
  
</div>
            

    </main>
    
    <footer>
        <p>&copy; 2024 Employee Management System</p>
    </footer>

    <script>
    function openSidebar() {
        document.getElementById("sidebar").style.width = "250px";
    }

    function closeSidebar() {
        document.getElementById("sidebar").style.width = "0";
    }
</script>

</body>
</html>
