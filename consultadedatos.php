<?php
require_once 'database.php';

// Get the user ID from the session
session_start();
$user_id = $_SESSION['user_id'];

// Query database to check if region, area, and city fields are filled in
$query = "SELECT region, area, city FROM users WHERE id = '$user_id'";
$result = $conn->query($query);
$user_profile = $result->fetch_assoc();

if (!empty($user_profile['region']) && !empty($user_profile['area']) && !empty($user_profile['city'])) {
    // User has filled in all fields, redirect to page A
    header('Location: sensores.php');
    exit;
} else {
    // User hasn't filled in all fields, redirect to page B
    header('Location: datos.php');
    exit;
}

?>