<?php
require_once 'database.php';

// Get the user ID from the session
session_start();
$user_id = $_SESSION['user_id'];

// Query database to check if region, area, and city fields are filled in
$query = "SELECT cultivo FROM users WHERE id = '$user_id'";
$result = $conn->query($query);
$user_profile = $result->fetch_assoc();

if (!empty($user_profile['cultivo'])) {
    // User has filled in all fields, redirect to page A
    header('Location: ./backend/consultadedatos.php');
    exit;
} else {
    // User hasn't filled in all fields, redirect to page B
    header('Location: ../webs/selecciondelcultivo.php');
    exit;
}

?>