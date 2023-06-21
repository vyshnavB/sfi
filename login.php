<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if the credentials are correct (example: username=admin, password=secret)
  if ($username === 'admin' && $password === 'password') {
    // Set the admin session variable
    $_SESSION['admin'] = true;

    // Redirect to the add_product.html page
    header('Location: add_product.php');
    exit;
  } else {
    // Invalid credentials, show an error message
    echo 'Invalid username or password.';
  }
}
?>
