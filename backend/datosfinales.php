<?php
// Connect to database
$conn = mysqli_connect("127.0.0.1", "root", "", "tecnoterra");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form data
if (isset($_POST)) {
    $city = $_POST['city'];
    $region = $_POST['region'];
    $area = $_POST['area_size']; // Note: You had a typo here, it should be 'area_size' instead of 'area'

    // Validate input
    if (empty($city) || empty($region) || empty($area)) {
        echo json_encode(array('Respuesta' => false, 'Error' => 'Please fill in all fields'));
        exit;
    }

    // Get the user ID from the session
    session_start();
    $user_id = $_SESSION['user_id'];

    // Insert data into locations table
    $sql = "UPDATE users SET city = '$city', region = '$region', area = '$area' WHERE id = '$user_id'";
   if (mysqli_query($conn, $sql)) {
    echo json_encode(array('Respuesta' => true));
} else {
    echo json_encode(array('Respuesta' => false, 'Error' => 'Error: ' . $sql . '<br />' . mysqli_error($conn)));
}
}

// Close connection
mysqli_close($conn);
?>