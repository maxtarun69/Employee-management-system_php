<?php
include 'header.php'; // Ensure header is included properly
?>
<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
    <link rel="stylesheet" href="../css/user.css">

</head>
<body>
    <section>
    <h1>Task List</h1>

    <!-- Form to filter tasks by Employee ID -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
        <label for="employee_id">Enter Employee ID:</label>
        <input type="text" id="employee_id" name="employee_id" required>
        <button type="submit" style="width:10%">View Tasks</button>
    </form>

    <ul>
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

            // Check if employee ID is provided in the GET request
            if (isset($_GET['employee_id'])) {
                $employee_id = $_GET['employee_id'];
                // Query to fetch tasks filtered by employee ID
                $sql = "SELECT * FROM task_view WHERE employee_id = :employee_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':employee_id', $employee_id, PDO::PARAM_INT);
                $stmt->execute();
                $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Display tasks
                foreach ($tasks as $task) {
                    echo "<li>";
                    echo "<strong>Task ID:</strong> " . htmlspecialchars($task['id']) . "<br>";
                    echo "<strong>Employee:</strong> " . htmlspecialchars($task['employee_id']) . "<br>";
                    echo "<strong>Task:</strong> " . htmlspecialchars($task['task']) . "<br>";
                    if (!$task['completed']) {
                        echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">';
                        echo '<input type="hidden" name="task_id" value="' . htmlspecialchars($task['id']) . '">';
                        echo '<button type="submit" style="width:15%">Mark as Completed</button>';
                        echo '</form>';
                    } else {
                        echo '<span class="completed">Completed</span>';
                    }
                    echo "</li>";
                }
            }

        } catch (PDOException $e) {
            // Handle database connection or query errors
            echo "Error: " . $e->getMessage();
        }

        // Close connection (optional if you're not executing more queries)
        $pdo = null;
        ?>
    </ul>
    </section>
</body>
</html>
<?php
    include 'footer.php'; // Ensure footer is included properly
?>