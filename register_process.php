<?php

include('bootstrap.php');

session_start();
include('db.php');




if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Note: Using NOW() to set both created_at and last_login initially
    $sql = "INSERT INTO users (username, email, firstname, lastname, password) 
            VALUES ('$username', '$email', '$firstname', '$lastname', '$password')";
    
    if ($connection->query($sql) === TRUE) {
        $_SESSION["registration_success"] = true;
        
        header("Location: login.php");
    } else {
        $_SESSION["registration_error"] = "Registration failed: " . $connection->error;
        header("Location: register.php");
    }
}

$connection->close();

?>



