<?php
// 1. Start the session to access the current user data
session_start();

// 2. Clear all session variables (removes user_id and user_name)
session_unset();

// 3. Destroy the session completely from the server
session_destroy();

// 4. Redirect the user
// Use "../index.php" to go back to the main homepage
// Use "login.php" if you want them to go back to the login screen
header("Location: ../index.php");
exit();
?>