<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecnoTerra</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./Public/styles/style.css">
</head>

<body>
    <div class="container">
        <div class="nombre">
            <img alt="Logo de TecnoTerra" src="nombre.png">
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
            <button class="btn" onclick="registerUser()">Registrarse</button>
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

        <script>
            // Función para togglear entre los formularios de inicio de sesión y registro
            function toggleForms() {
                const loginForm = document.getElementById('login-form');
                const registerForm = document.getElementById('register-form');
                const registerLink = document.getElementById('register-link');
                const backArrow = document.getElementById('back-arrow');

                // Agregar animación al toggle
                if (loginForm.classList.contains('hidden')) {
                    loginForm.classList.remove('hidden');
                    registerForm.classList.add('hidden');
                    registerLink.classList.remove('hidden');
                    backArrow.classList.add('hidden');
                } else {
                    loginForm.classList.add('hidden');
                    registerForm.classList.remove('hidden');
                    registerLink.classList.add('hidden');
                    backArrow.classList.remove('hidden');
                }
            }

            // Función para validar campos vacíos en el formulario de inicio de sesión
            function validateLoginForm() {
                const usernameInput = document.getElementById('login-usuario');
                const passwordInput = document.getElementById('login-password');

                if (usernameInput.value.trim() === '' || passwordInput.value.trim() === '') {
                    alert('Por favor, ingresa ambos campos');
                    return false;
                }
                const formData = new FormData();
                formData.append('username', usernameInput.value);
                formData.append('password', passwordInput.value);
                formData.append("login", true)


                fetch('login.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {


                        console.log(data)
                        
                        if (data.Respuesta) {
                            window.location.href = 'sensores.php';
                        } else {
                            alert('Credenciales incorrectas');
                        }
                    })
                    .catch(error => console.error(error));

                return true;



            }

            // Función para validar campos vacíos en el formulario de registro
            function validateRegisterForm() {
                const usernameInput = document.getElementById('register-usuario');
                const emailInput = document.getElementById('register-email');
                const passwordInput = document.getElementById('register-password');
                const phoneInput = document.getElementById('register-phone');

                if (usernameInput.value.trim() === '' || emailInput.value.trim() === '' || passwordInput.value.trim() === '' || phoneInput.value.trim() === '') {
                    alert('Por favor, ingresa todos los campos');
                    return false;
                } else {
                    // Redirigir a la otra página si los campos están llenos
                    const formData = new FormData();
                    formData.append('username', usernameInput.value);
                    formData.append('password', passwordInput.value);

                    fetch('login.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            if (data === 'success') {
                                window.location.href = 'nueva_pagina.html';
                            } else {
                                alert('Credenciales incorrectas');
                            }
                        })
                        .catch(error => console.error(error));

                    return true;
                }
            }

            document.querySelector('.btn').addEventListener('click', (e) => {
                e.preventDefault();
                if (!validateLoginForm()) {
                    return;
                }
            });
            // Función para registrar un nuevo usuario
            async function registerUser() {
                // Obtener los valores de los campos del formulario de registro
                const usernameInput = document.getElementById('register-usuario');
                const emailInput = document.getElementById('register-email');
                const passwordInput = document.getElementById('register-password');
                const phoneInput = document.getElementById('register-phone');

                const formData = new FormData();
                formData.append('username', usernameInput.value);
                formData.append('email', emailInput.value);
                formData.append('password', passwordInput.value);
                formData.append('phone', phoneInput.value);

                // Validar los campos del formulario de registro
                if (validateRegisterForm()) {
                    console.log('Registro exitoso');
                    console.log('Nombre de usuario:', usernameInput.value);
                    console.log('Correo electrónico:', emailInput.value);
                    console.log('Contraseña:', passwordInput.value);
                    console.log('phone',phoneInput.value)

                    //try {
                    //    const resp = await fetch('register.php', {
                    //         method: 'POST',
                    //         body: formData
                    //     })

                    //     console.log(resp)
                    //    const data = await resp.json()
                    //    console.log(data)

                    // } catch (error) {

                    //     console.log(error)
                    // }

                    fetch('register.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => console.log(data))
                        .catch(error => console.error(error));
                }
            }

            // Agregar eventos a los botones de inicio de sesión y registro
            document.getElementById('register-link').addEventListener('click', () => {
                toggleForms();
            });

            document.getElementById('back-arrow').addEventListener('click', toggleForms);

            // Agregar evento al botón de inicio de sesión
            document.querySelector('.btn').addEventListener('click', (e) => {
                e.preventDefault();
                validateLoginForm();
            });

            // Agregar evento al botón de registro
            document.getElementById('register-form').addEventListener('submit', (e) => {
                e.preventDefault();
                registerUser();
            });
        </script>
</body>

</html>