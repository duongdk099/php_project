<?php
session_start();

// Unset only the admin_logged_in session variable
unset($_SESSION['admin_logged_in']);

// Redirect to the desired page after logout, e.g., index.php or admin_login.php
header('Location: admin_login.php');
exit;
