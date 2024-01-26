<?php
session_start(); // Start the session or resume the existing session

unset($_SESSION['Username']); // Unset the 'Username' session variable
unset($_SESSION['Password']); // Unset the 'Password' session variable

session_destroy(); // Destroy the entire session data

header("Location: index.php"); // Redirect the user to the 'index.php' page
exit; // Terminate the script execution
?>
