<?php
// session_start() starts a session.
session_start();
// The isset() function checks if a variable for the session 'user' is set. (during login)
// If the session variable 'user' already exists, the user is already logged in.
if (isset($_SESSION['user'])) {
    // The header() function redirects the user to (in this case) the page "protected.php"
    header('Location: protected.php');
  // exit() stops the script.
  exit();
}
?>

<!DOCTYPE html>
<!-- specifies the Swedish language -->
<html lang="sv">
<head>
  <!-- Required title of the page displayed in the browser (tab) -->
  <title>Login Form</title>
</head>
<body>
  <!--heading-->
  <h2>Login Form</h2>
  <!-- A form that sends the user’s input to "login.php" with the POST method -->
  <form action="login.php" method="post">
    <!-- Label and input field for the username -->
    <label for="username">Username:</label>
    <!-- text input where the user enters their username -->
    <input type="text" name="username" id="username"><br>
    <!-- Label for the password -->
    <label for="password">Password:</label>
    <!-- Password input where the user enters their password -->
    <input type="password" name="password" id="password"><br>
    <!-- A button that submits the form data to "login.php" -->
    <input type="submit" value="Log in">
  </form>
</body>
</html>
