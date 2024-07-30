<?php
// Start the session
session_start();

// Destroy all session data
session_destroy();

// Redirect to login page or any other appropriate page after logout
header("Location: ../view/index.html");
exit;
?>
