<?php
// Starts or resumes the session.
session_start();
// Checks if the session variable 'user' is set. If not (the user is not logged in), they are redirected to the login page (index.php).
if (!isset($_SESSION['user'])) {
  // Redirects to the login page if the user is not logged in.
  header('Location: index.php');
  // Stops the script execution after the redirect.
  exit();
}
// Welcomes the logged-in user by using their username stored in the session.
echo "Welcome, " . $_SESSION['user'] . "!";
?>
