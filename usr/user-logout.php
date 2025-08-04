<?php
    session_start();

    // Unset only the user session variables
    unset($_SESSION['u_id']); // Unset user session
    unset($_SESSION['login']); // If you also store the user's email in the session, unset it as well

    // Optionally, check if there are other session variables to keep (e.g., admin_id)
    if(empty($_SESSION['a_id'])) {
        // If admin is not logged in, destroy the session entirely
        session_destroy();
    }

    // Redirect to the correct index page at the root level
    header("Location: /E-Booking/index.php");
    exit;
?>


