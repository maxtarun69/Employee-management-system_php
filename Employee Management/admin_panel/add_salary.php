<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Position - Employee Management System</title>
    <script src="myscripts.js"></script>
    <style>
        /* Style for form */
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 300px; /* Adjust width as needed */
        }

        /* Style for table */
        table {
            width: 100%;
        }

        table tr td {
            padding: 10px;
        }

        /* Style for button */
        button[type="submit"] {
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        /* Style for input fields */
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
    </style>
</head>
<?php include 'header.php'; ?>
<body style="font-family: Arial, sans-serif; background-color: #f2f2f2; margin: 0; padding: 0;">
    
    <main style="padding: 20px;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return confirmChangePosition();">
        <h2>Position Information</h2>
        <table>
            <tr>
                <td><label for="employeeId">Employee ID:</label></td>
                <td><input type="text" id="employeeId" name="employeeId" required></td>
            </tr>
            <tr>
                <td><label for="firstName">First Name:</label></td>
                <td><input type="text" id="firstName" name="firstName" required></td>
            </tr>
            <tr>
                <td><label for="position">Salary:</label></td>
                <td><input type="text" id="salary" name="salary" required></td>
            </tr>
        </table>
        <button type="submit" name="submit">Save Changes</button>
    </form>
    </main>
    <?php include 'footer.php'; ?>

    <script>
        function confirmChangePosition() {
            return confirm('Are you sure you want to change the salary?');
        }

        <?php if(isset($_GET['success']) && $_GET['success'] == 'true'): ?>
            alert("Changes saved successfully!");
        <?php endif; ?>
    </script>

<?php
include '../connection/connect.php';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $employeeId = mysqli_real_escape_string($conn, $_POST['employeeId']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);

    // Update data in employees table
    $sql = "UPDATE employees SET salary='$salary' WHERE Employee_ID='$employeeId' AND First_Name='$firstName'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the same page with success parameter
        header("Location: {$_SERVER['PHP_SELF']}?success=true");
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

</body>
</html>
