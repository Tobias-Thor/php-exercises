<?php
// Starts a new session or resumes an existing one.
session_start();

// Database connection details (server, database name, username, and password).
// Address of the database server.
$host = 'localhost';
// The name of the database to connect to.
$dbname = 'login-database';
// The database username.
$user = 'yourUserName';
// The database password.
$password = 'yourPassword';

// Attempt to connect to the database using PDO (PHP Data Objects).
try {
  // Create a new PDO instance to connect to the database.
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  // Set the PDO object to throw exceptions on errors. This helps with debugging.
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Retrieve the username and password from the form sent via the POST method.
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Prepare an SQL statement to retrieve user data from the database where the username matches the input.
  // A "prepared statement" is used to protect against SQL injection (the values are sent separately from the SQL code).
  $stmt = $pdo->prepare("SELECT * FROM users WHERE name = :username");
  // Execute the prepared statement ('username' is replaced with the actual username from the POST input).
  $stmt->execute(['username' => $username]);
  // Retrieve the user record that matches the entered username from the database.
  // If a user with that name exists, $user will contain the user’s data.
  $user = $stmt->fetch();

  // Check if a user was found and if the entered password matches the password in the database.
  // password_verify() is used to compare the hashed password with the entered password.
  if ($user && password_verify($password, $user['password'])) {
    // If the password is correct, set a session variable for the user so they are logged in.
    // The user’s name is stored in the session to check that they are logged in.
    $_SESSION['user'] = $user['name'];
    // If the login is successful, the user is redirected to the protected page (in this case, protected.php).
    header('Location: protected.php');
    // Stops the script.
    exit();
    // If the username does not exist or the password is incorrect, an error message is displayed.
  } else {
    // Incorrect username or password
    echo 'Incorrect username or password';
  }
// If any error occurs during the connection to the database or the execution of the SQL, it is caught here and an error message is displayed.  
// This helps with debugging.
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>
