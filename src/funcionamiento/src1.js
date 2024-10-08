// Variable global para determinar si se está en el formulario de inicio de sesión o registro
let isLoginForm = true;

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
        isLoginForm = true;
        clearFormData();
    } else {
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
        registerLink.classList.add('hidden');
        backArrow.classList.remove('hidden');
        isLoginForm = false;
        clearFormData();
    }
}

// Función para clear form data
function clearFormData() {
    document.querySelectorAll('input').forEach(input => input.value = '');
    document.querySelectorAll('#login-form input').forEach(input => input.value = ''); // Clear login form data
    document.querySelectorAll('#register-form input').forEach(input => input.value = ''); // Clear register form data
}

// Función para validar campos vacíos en el formulario de inicio de sesión
function validateLoginForm() {
    const usernameInput = document.getElementById('login-usuario');
    const passwordInput = document.getElementById('login-password');

    if (usernameInput.value.trim() === '' || passwordInput.value.trim() === '') {
        alert('Por favor, ingresa ambos campos');
        return false;
    } else {
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
                    window.location.href = './backend/peticioncultivo.php';
                } else {
                    alert('Usuario o contraseña incorrecta');
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

    if (usernameInput.value.trim() === '' || emailInput.value.trim() === '' || passwordInput.value.trim() === '' || phoneInput.value.trim() === '') {
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
        console.log('phone', phoneInput.value)

        fetch('./backend/register.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                if (data.Respuesta === 'Username already exists') {
                    alert('Usuario ya existe');
                }
                if (data.Respuesta === 'Registration successful') {
                    toggleForms();
                    clearFormData();
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
    toggleForms();
});

document.getElementById('back-arrow').addEventListener('click', toggleForms);

// Agregar evento al botón de inicio de sesión
document.getElementById('login-btn').addEventListener('click', (e) => {
    e.preventDefault();
    validateLoginForm();
});

// Agregar evento al botón de registro
document.getElementById('register-form').addEventListener('submit', (e) => {
    e.preventDefault();
    registerUser();
});

document.getElementById('register-btn').addEventListener('click', () => {
    registerUser();
});
