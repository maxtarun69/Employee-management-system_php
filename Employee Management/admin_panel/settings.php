<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/style.css">
<title>Account Settings</title>
</head>
<body>

<div class="login-container">
  <h1 class="had">Account Settings</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" placeholder = "Enter Username" required>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder = "Enter Your Email" required>
    <label for="password">New Password:</label>
    <input type="password" id="password" name="password" placeholder="Leave blank to keep current password">
    <button type="submit">Save Changes<button>
  </form>
</div>

<?php
// Database configuration
include '../connection/connect.php';
// Process form submission for updating account settings
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $new_password = $_POST["password"];

    // Update user information in the database
    $sql = "UPDATE register SET email='$email'";
    if (!empty($new_password)) {
        // If a new password is provided, update it
        $sql .= ", password='$new_password'";
    }
    $sql .= " WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='login-container'>Account settings updated successfully</div>";
    } else {
        echo "<div class='login-container'>Error updating account settings: " . $conn->error . "</div>";
    }
}

// Close connection
$conn->close();
?>

</body>
</html>
