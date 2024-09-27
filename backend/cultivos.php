<?php
// Connect to database
$conn = mysqli_connect("127.0.0.1", "root", "", "tecnoterra");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form data
if (isset($_POST)) {
    $data = json_decode(file_get_contents('php://input'), true);
    $cultivos = $data['cultivos'];

    // Validate input
    if (empty($cultivos)) {
        echo json_encode(array('Respuesta' => false, 'Error' => 'Please fill in all fields'));
        exit;
    }

    // Get the user ID from the session
    session_start();
    $user_id = $_SESSION['user_id'];

    // Insert data into users table
    $sql = "UPDATE users SET cultivo = '" . implode(',', $cultivos) . "' WHERE id = '$user_id'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('Respuesta' => true));
    } else {
        echo json_encode(array('Respuesta' => false, 'Error' => 'Error: ' . $sql . '<br />' . mysqli_error($conn)));
    }
}

// Close connection
mysqli_close($conn);
?>