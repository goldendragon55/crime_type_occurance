<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: homepage.html");
    exit();
}

// Logout logic
if (isset($_POST['logout'])) {
    // Clear all session variables
    session_unset();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to the index page or any other appropriate action
    header("Location: homepage.html");
    exit();
}
?>