<?php

// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Delete the session cookie
setcookie(session_name(), '', time() - 3600);

// Redirect the user to the login page
echo '<script>alert("Anda Telah Logout");window.location="auth-login.php"</script>';
?>