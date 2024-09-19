<?php
require_once 'database.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
     $phone = $_POST['phone'];

    // Validate input
    if (empty($username) || empty($email) || empty($password) || empty($phone)){
        echo "Please fill in all fields";
        exit;
    }

    // Check if username already exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "Username already exists";
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert into database
    $query = "INSERT INTO users (username, email, password,phone) VALUES ('$username', '$email', '$hashed_password', $phone)";
    if ($conn->query($query) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>