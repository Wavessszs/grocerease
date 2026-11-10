<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3;url=login.php"> <!-- Auto-redirect after 3 seconds -->
    <title>Logout</title>
</head>
<body>
    <p>You have been logged out. Redirecting to the login page...</p>
    <script>
        // Optional: Redirect using JavaScript after a short delay
        setTimeout(function(){
            window.location.href = 'login/login.php';
        }, 3000); // Redirect after 3 seconds
    </script>
</body>
</html>
