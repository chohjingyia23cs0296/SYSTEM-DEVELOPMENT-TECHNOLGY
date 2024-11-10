<?php
session_start(); // Start the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Prevent back button access after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
header("Location: login.php"); // Redirect to login page
exit();
?>
