<?php
error_reporting(0);

// Iniciar sesión
session_start();

// Verificar si la sesión tiene una ID de usuario
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Verificar si se ha enviado una solicitud de cierre de sesión explícita
    if (isset($_GET['cerrar_sesion']) && $_GET['cerrar_sesion'] == 'true') {
        try {
            // Cerrar sesión y eliminar variables de sesión
            session_unset();
            session_destroy();

            // Return a JSON response
            $response = array('success' => true, 'message' => 'Sesión cerrada correctamente');
        } catch (Exception $e) {
            $response = array('success' => false, 'message' => 'Error: ' . $e->getMessage());
        }
    } else {
        // Si no se ha enviado una solicitud de cierre de sesión explícita, return an error response
        $response = array('success' => false, 'message' => 'No se ha enviado una solicitud de cierre de sesión');
    }
} else {
    // Si no hay sesión iniciada, return an error response
    $response = array('success' => false, 'message' => 'No hay sesión iniciada');
}

// Output the JSON response
ob_clean();
flush();
header('Content-Type: application/json; charset=UTF-8');
$response = trim(json_encode($response, JSON_UNESCAPED_SLASHES));
echo $response;
exit;
?>