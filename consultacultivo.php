<?php
require_once 'database.php';

// Iniciar sesión
session_start();

// Verificar si la sesión tiene una ID de usuario
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Consultar la base de datos para obtener el cultivo del usuario
    $query = "SELECT cultivo FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si la consulta devolvió resultados
    if ($result) {
        $user_cultivo = $result->fetch_assoc();

        // Mostrar el cultivo del usuario
        $data = array(
            'cultivo' => $user_cultivo['cultivo'],
        );
        // Enviar los datos como JSON
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_SLASHES);
    }
}
?>