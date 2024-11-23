<?php
require_once 'database.php';

// Iniciar sesión
session_start();

// Verificar si la sesión tiene una ID de usuario
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Verificar si se envió una solicitud para modificar los campos de temperatura y humedad
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] == 'application/json') {
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);

        $fields_to_update = array();

        if (isset($data['temperatura'])) {
            $fields_to_update[] = "temperature = '{$data['temperatura']}'";
        }
        if (isset($data['humedad'])) {
            $fields_to_update[] = "humidity = '{$data['humedad']}'";
        }

        if (!empty($fields_to_update)) {
            $query = "UPDATE users SET " . implode(', ', $fields_to_update) . " WHERE id = '$user_id'";
            $conn->query($query);

            // Verificar si se actualizó correctamente
            if ($conn->affected_rows > 0) {
                echo json_encode(array('message' => 'Datos actualizados correctamente'));
            } else {
                echo json_encode(array('message' => 'No se pudo actualizar los datos'));
            }
        } else {
            echo json_encode(array('message' => 'No se enviaron datos para actualizar'));
        }
    } else {
        // Consultar la base de datos para obtener los campos de temperatura y humedad
        $query = "SELECT temperature, humidity FROM users WHERE id = '$user_id'";
        $result = $conn->query($query);

        // Verificar si la consulta devolvió resultados
        if ($result) {
            $user_data = $result->fetch_assoc();

            if ($user_data) { // Verifica que se obtuvieron datos
                $data = array(
                    'temperatura' => $user_data['temperature'],
                    'humedad' => $user_data['humidity'],
                );
                header('Content-Type: application/json');
                echo json_encode($data, JSON_UNESCAPED_SLASHES);
            } else {
                // Si no se encontraron datos, puedes enviar un mensaje de error
                echo json_encode(array('error' => 'No se encontraron datos.'));
            }
        } else {
            echo json_encode(array('error' => 'Error en la consulta.'));
        }
    }
} else {
    echo json_encode(array('error' => 'No se ha iniciado sesión.'));
}
?>