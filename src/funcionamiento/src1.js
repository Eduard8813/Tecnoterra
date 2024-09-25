let isLoginForm = true;
document.querySelectorAll('register').forEach(input => input.value = '');
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
    else {
        const formData = new FormData();
        formData.append('username', usernameInput.value);
        formData.append('password', passwordInput.value);
        formData.append("login", true)


        fetch('./backend/login.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {


                console.log(data)

                if (data.Respuesta === 'Login successful') {
                    window.location.href = './backend/consultadedatos.php';
                } else {
                    alert('Credenciales incorrectas');
                }
            })
            .catch(error => console.error(error));
        return true;
    }

}


// Función para validar campos vacíos en el formulario de registro
function validateRegisterForm() {
    const usernameInput = document.getElementById('register-usuario');
    const emailInput = document.getElementById('register-email');
    const passwordInput = document.getElementById('register-password');
    const phoneInput = document.getElementById('register-phone');
    const cultivoInput = document.getElementById('register-cultivo');

    if (usernameInput.value.trim() === '' || emailInput.value.trim() === '' || passwordInput.value.trim() === '' || phoneInput.value.trim() === '' || cultivoInput.value.trim() === '') {
        alert('Por favor, ingresa todos los campos');
        return false;
    } else {
        return true;
    }
}

// Función para registrar un nuevo usuario
async function registerUser() {
    // Obtener los valores de los campos del formulario de registro
    const usernameInput = document.getElementById('register-usuario');
    const emailInput = document.getElementById('register-email');
    const passwordInput = document.getElementById('register-password');
    const phoneInput = document.getElementById('register-phone');
    const cultivoInput = document.getElementById('register-cultivo');

    const formData = new FormData();
    formData.append('username', usernameInput.value);
    formData.append('email', emailInput.value);
    formData.append('password', passwordInput.value);
    formData.append('phone', phoneInput.value);
    formData.append('cultivo', cultivoInput.value);

    // Validar los campos del formulario de registro
    if (validateRegisterForm()) {
        console.log('Registro exitoso');
        console.log('Nombre de usuario:', usernameInput.value);
        console.log('Correo electrónico:', emailInput.value);
        console.log('Contraseña:', passwordInput.value);
        console.log('phone', phoneInput.value)
        console.log('Cultivo', cultivoInput.value);

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

        fetch('./backend/register.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                if (data.Respuesta === 'Registration successful') {
                    toggleForms();
                    document.querySelectorAll('input').forEach(input => input.value = '');
                }
            })
            .catch(error => console.error(error));
    }
}
// Agregar eventos a los botones de inicio de sesión y registro
document.getElementById('register-link').addEventListener('click', () => {
    isLoginForm = false;
    toggleForms();
});

document.getElementById('login-link').addEventListener('click', () => {
    isLoginForm = true;
    validateLoginForm();
});

document.getElementById('back-arrow').addEventListener('click', toggleForms);

// Agregar evento al botón de inicio de sesión
document.querySelector('.btn').addEventListener('click', (e) => {
    e.preventDefault();
    if (isLoginForm) {
        // Estoy en el formulario de login
        validateLoginForm();
    } else {
        // Estoy en el formulario de registro
        toggleForms();
    }
});
// Agregar evento al botón de registro
document.getElementById('register-form').addEventListener('submit', (e) => {
    e.preventDefault();
    registerUser();
});

document.getElementById('register-btn').addEventListener('click', () => {
    validateLoginForm();
});