<?php
require_once 'database.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($password)) {
        echo "Please fill in all fields";
        exit;
    }
      //echo conn; 
    // Query database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        if (password_verify($password, $user_data['password'])) {
            // Login successful, start session
            session_start();
            $_SESSION['username'] = $username;
            echo "Login successful";
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Username not found";
    }

    if ($auth_success) {
        echo 'success';
    } else {
        echo 'error';
    }

}

?>