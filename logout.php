<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
 header("Location: 125.php?hard=Logout Successfully🙄");
exit();
?>