<?php
// Start the session
session_start();

// Unset all of the session variables
if(isset($_SESSION['userid'])) {
    unset($_SESSION['userid']);
}
// $_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other desired page
header("Location: signin-new.php");
// exit;
die;