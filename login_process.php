<?php
session_start();
include('db.php'); // Include db.php to establish the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user data from the database based on username
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);

    // Verify the password
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id']; // Store user ID in the session
        $_SESSION['username'] = $user['username']; // Store username in the session
        header('Location: dashboard.php'); // Redirect to the vendors page
        exit();
    } else {
        header('Location: login.php?error=1');
        exit();
        // echo "Invalid username or password";
        // $error_message = "Invalid username or password";
    }
}
?>
