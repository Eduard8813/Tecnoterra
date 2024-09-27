<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecnoTerra</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./Public/styles/style1.css">
</head>

<body>
    <div class="container">
        <div class="nombre">
            <img alt="Logo de TecnoTerra" src="./Public/Imagenes/nombre.png">
        </div>
        <p>¡Bienvenido!</p>
        <!-- Formulario de registro -->
        <div id="register-form" class="hidden">
            <h2>Registro</h2>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Nombre de usuario" id="register-usuario">
                <div id="register-usuario-error" class="hidden text-red-500 text-sm">El nombre de usuario es obligatorio.</div>
                <div id="register-usuario-length-error" class="hidden text-red-500 text-sm">El nombre de usuario debe tener al
                    menos 8 caracteres.</div>
            </div>
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Correo electrónico" id="register-email">
                <div id="register-email-error" class="hidden text-red-500 text-sm">El correo electrónico es obligatorio.</div>
                <div id="register-email-invalid-error" class="hidden text-red-500 text-sm">El correo electrónico no es válido.
                </div>
                </div>
                
                <div class="input-group">
                    <i class="fas fa-phone"></i>
                     <input type="tel" placeholder="Número de teléfono" id="register-phone">
                     <div id="register-phone-error" class="hidden text-red-500 text-sm">El número de teléfono es obligatorio.</div>
                </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Contraseña" id="register-password">
                <div id="register-password-error" class="hidden text-red-500 text-sm">La contraseña es obligatoria.</div>
                <div id="register-password-invalid-error" class="hidden text-red-500 text-sm">La contraseña debe tener al menos
                    8 caracteres.</div>
            </div>
            <button class="btn" onclick="registerUser()">Crear usuario</button>
            <i id="back-arrow" class="fas fa-arrow-left" onclick="toggleForms()">Atrás</i>
        </div>

        <!-- Formulario de inicio de sesión -->
        <div id="login-form">
            <h2>Iniciar sesión</h2>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Nombre de usuario" id="login-usuario">
                <div id="login-usuario-error" class="hidden text-red-500 text-sm">El nombre de usuario es obligatorio.</div>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Contraseña" id="login-password">
                <div id="login-password-error" class="hidden text-red-500 text-sm">La contraseña es obligatoria.</div>
            </div>
            <button class="btn" onclick="validateLoginForm()">Iniciar sesión</button>
            <p id="text" class="mt-4">¿Aún no tienes una cuenta?</p>
            <a class="register-link" href="#" id="register-link">Crear cuenta</a>
        </div>

        <script src = "./src/funcionamiento/src1.js"></script>
</body>

</html>