<?php
require_once 'database.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
//  echo json_encode($_POST);
//  return;
       $password = $_POST['password'];
    
    // Validate input
    if (empty($username) || empty($password)) {
        echo json_encode( ["Respuesta"=> "Please fill in all fields"]);
        exit;
    }

    // Query database
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        if (password_verify($password, $user_data['password'])) {
            // Login successful, start session
            session_start();
            $_SESSION['username'] = $username;
            echo json_encode(["Respuesta" => "Login successful"]);
            return;
        } else {
            echo json_encode(["Respuesta" => "Invalid password"]);
            return;
        }
    } else {
        echo json_encode(["Respuesta" => "Username not found"]);
        return;
    }

    if ($auth_success) {
        echo 'success';
    } else {
        echo 'error';
    }

}

?>