<?php
require_once 'database.php';

// Iniciar sesión
session_start();

// Verificar si la sesión tiene una ID de usuario
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Consultar la base de datos para obtener los campos de la tabla users
    $query = "SELECT username, email, phone, password, city, region, area, cultivo, direccion FROM users WHERE id = '$user_id'";
    $result = $conn->query($query);

    // Verificar si la consulta devolvió resultados
    if ($result) {
        $user_profile = $result->fetch_assoc();

        // Mostrar los datos actuales del perfil
        $data = array(
            'nombre' => $user_profile['username'],
            'correo' => $user_profile['email'],
            'contraseña' => $user_profile['password'],
            'telefono' => $user_profile['phone'],
            'cultivos' => $user_profile['cultivo'],
            'direccion' => $user_profile['direccion'],
            'ciudad' => $user_profile['city'],
            'region' => $user_profile['region'],
            'tamaño_cultivo' => $user_profile['area'],
        );
        // Enviar los datos como JSON
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_SLASHES);
    }

    // Verificar si se envió una solicitud para modificar los campos
    if (isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] == 'application/json') {
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);

        $fields_to_update = array();

        if (isset($data['usuario'])) {
            $fields_to_update[] = "username = '{$data['usuario']}'";
        }
        if (isset($data['correo'])) {
            $fields_to_update[] = "email = '{$data['correo']}'";
        }
        if (isset($data['numero'])) {
            $fields_to_update[] = "phone = '{$data['numero']}'";
        }
        if (isset($data['contraseña'])) {
            $hashed_password = password_hash($data['contraseña'], PASSWORD_BCRYPT);
            $fields_to_update[] = "password = '$hashed_password'";
        }
        if (isset($data['city'])) {
            $fields_to_update[] = "city = '{$data['city']}'";
        }
        if (isset($data['region'])) {
            $fields_to_update[] = "region = '{$data['region']}'";
        }
        if (isset($data['cultivo'])) {
            $fields_to_update[] = "cultivo = '{$data['cultivo']}'";
        }
        if (isset($data['direccion'])) {
            $fields_to_update[] = "direccion = '{$data['direccion']}'";
        }
        if (isset($data['area'])) {
            $fields_to_update[] = "area = '{$data['area']}'";
        }

        if (!empty($fields_to_update)) {
            $query = "UPDATE users SET " . implode(', ', $fields_to_update) . " WHERE id = '$user_id'";
            $conn->query($query);

            // Verificar si se actualizó correctamente
            if ($conn->affected_rows > 0) {
                echo 'Perfil actualizado correctamente';
            } else {
                echo 'No se pudo actualizar el perfil';
            }
        }
    }
}
?>