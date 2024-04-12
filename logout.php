<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
    // Destroy the session
    session_destroy();
    
    // Redirect to the login page or any other desired page
    header("Location: index.php");
    exit();
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: loginbase.php");
    exit();
}
?>
