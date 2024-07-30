
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <style>
        /* Style for input fields */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style for the submit button */
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form id="deleteAccountForm" action="delete_account.php" method="POST" onsubmit="return validateForm()">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        
        <button type="submit">Delete Account</button>
    </form>

    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password !== confirm_password) {
                alert("Passwords do not match.");
                return false;
            }

            return true;
        }
    </script>

</body>
</html>

    </div>
    <?php
// Include the database connection details

include '../connection/connect.php';
// Process delete account form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if the passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit; // Exit the script if passwords do not match
    }

    // Check if the username and password match in the database
    $stmt = $conn->prepare("SELECT * FROM register WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Delete the account if username and password match
        $delete_stmt = $conn->prepare("DELETE FROM register WHERE username = ?");
        $delete_stmt->bind_param("s", $username);

        if ($delete_stmt->execute()) {
            echo "<script>window.location = 'index.html';</script>";
            // You can redirect the user to another page if needed
        } else {
            echo "Error deleting account: " . $delete_stmt->error;
        }

        // Close the delete statement
        $delete_stmt->close();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    // Close result set
    $result->close();
}

// Close connection
$conn->close();
?>

</body>
</html>
