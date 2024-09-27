<?php
require_once 'database.php';
//echo json_encode([$_POST, "Respuesta" => "Respuesta"]);
//return;

if (isset($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    //echo json_encode([$_POST, "Respuesta" => "Respuesta"]);
    //return;
     
    // Validate input]
    if (empty($username) || empty($email) || empty($password) || empty($phone)) {
        echo json_encode(["Respuesta" => "Please fill in all fields"]);
        exit;
    }

    // Check if username already exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        
        echo json_encode(["Respuesta" => "Username already exists"]);

        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $query = "INSERT INTO users (username, email, password,phone) VALUES ('$username', '$email', '$hashed_password', '$phone')";
    if ($conn->query($query) === TRUE) {
        
        echo json_encode(["Respuesta" => "Registration successful"]);

        exit;


    } else {
    
        echo json_encode(["Respuesta" => "Error: " . $query . "<br>" . $conn->error]);

        exit;

    }
}
?>