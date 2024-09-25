// Función para toggle el menú
function toggleMenu() {
  var navBar = document.querySelector('.nav-bar');
  if (navBar.style.display === 'none' || navBar.style.display === '') {
    navBar.style.display = 'block';
  } else {
    navBar.style.display = 'none';
  }
}

document.addEventListener('DOMContentLoaded', function() {
  showUserContent();
});

function setActiveIcon(iconId) {
  var icons = document.querySelectorAll('.sidebar .icon');
  icons.forEach(function(icon) {
    icon.classList.remove('active');
  });
  document.getElementById(iconId).classList.add('active');
  
  if (iconId === 'user-icon') {
    showUserContent();
  }
}
// Función para mostrar el contenido del usuario
async function showUserContent() {
  document.getElementById('location-content').classList.add('hidden');
  document.getElementById('settings-content').classList.add('hidden');
  document.getElementById('user-content').classList.remove('hidden');
  setActiveIcon('user-icon');

  fetch('../backend/solicituddedatos.php', {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    if (!data || typeof data !== 'object') {
      // Manejar error: respuesta inválida
      console.error('Error: respuesta inválida');
      return;
    }
    if (data.error) {
      // Manejar error: error en la respuesta
      console.error('Error:', data.error);
      return;
    }

    // Verificar si el elemento existe antes de intentar establecer su valor
    var usuarioElement = document.getElementById('usuario');
    if (usuarioElement) {
      usuarioElement.value = data.nombre;
    } else {
      console.error('Error: elemento no encontrado');
    }

    // Repetir el mismo proceso para los demás elementos
    var correoElement = document.getElementById('correo');
    if (correoElement) {
      correoElement.value = data.correo;
    } else {
      console.error('Error: elemento no encontrado');
    }

    var numeroElement = document.getElementById('numero');
    if (numeroElement) {
      numeroElement.value = data.telefono;
    } else {
      console.error('Error: elemento no encontrado');
    }

    var direccionElement = document.getElementById('direccion');
    if (direccionElement) {
      direccionElement.value = data.direccion;
    } else {
      console.error('Error: elemento no encontrado');
    }

    document.getElementById('usuario').value = data.nombre;
    document.getElementById('correo').value = data.correo;
    document.getElementById('numero').value = data.telefono;
    document.getElementById('cultivo').value = data.cultivos;
    document.getElementById('direccion').value = data.direccion;
    document.getElementById('cuidad').value = data.ciudad;
    document.getElementById('region').value = data.region;
    document.getElementById('area').value = data.tamaño_cultivo;

    // Mostramos los datos del usuario en los campos de formulario
    document.getElementById('usuario').disabled = false;
    document.getElementById('correo').disabled = false;
    document.getElementById('numero').disabled = false;
    document.getElementById('cultivo').disabled = false;
    document.getElementById('direccion').disabled = false;
    document.getElementById('cuidad').disabled = false;
    document.getElementById('region').disabled = false;
    document.getElementById('area').disabled = false;
  })
  .catch(error => console.error('Error:', error));
}

// Función para mostrar el contenido de la ubicación
function showLocationContent() {
  document.getElementById('user-content').classList.add('hidden');
  document.getElementById('settings-content').classList.add('hidden');
  document.getElementById('location-content').classList.remove('hidden');
  setActiveIcon('location-icon');
}

// Función para mostrar el contenido de la configuración
function showSettingsContent() {
  document.getElementById('user-content').classList.add('hidden');
  document.getElementById('location-content').classList.add('hidden');
  document.getElementById('settings-content').classList.remove('hidden');
  setActiveIcon('settings-icon');
}

// Función para establecer el icono activo
function setActiveIcon(iconId) {
  var icons = document.querySelectorAll('.sidebar .icon');
  icons.forEach(function(icon) {
    icon.classList.remove('active');
  });
  document.getElementById(iconId).classList.add('active');
}

// Función para cambiar el idioma
function changeLanguage(language) {
  var elements = document.querySelectorAll('[data-lang]');
  elements.forEach(function(element) {
    element.textContent = element.getAttribute('data-lang-' + language);
  });
}

// Función para habilitar la edición
function enableEditing(section) {
  var inputs = document.querySelectorAll(`#${section} .form-group input`);
  inputs.forEach(function(input) {
    input.removeAttribute('disabled');
  });
  document.querySelector(`#${section} .edit-button`).classList.add('hidden');
  document.querySelector(`#${section} .save-button`).classList.remove('hidden');
}

// Función para guardar los cambios
async function saveChanges(section) {
  document.querySelector(`#${section} .save-button`).classList.add('hidden');
  document .querySelector(`#${section} .edit-button`).classList.remove('hidden');
  var userId = document.getElementById('user-id').dataset.value;
  var inputs = document.querySelectorAll(`#${section} .form-group input`);
  var data = {
    user_id: userId,
    submit: true
  };
  inputs.forEach(function(input) {
    data[input.id] = input.value;
  });

  // Enviar los datos al servidor
  fetch('../backend/solicituddedatos.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
  .then(response => response.json())
  .then(data => {
    if (data.error) {
      console.error('Error:', data.error);
    } else {
      console.log('Cambios guardados con éxito');
    }
  })
  .catch(error => console.error('Error:', error));
}
/*
// Función para mostrar la foto de perfil
function showProfilePicture() {
  var userIdElement = document.getElementById('user-id');
  if (userIdElement) {
    var userId = userIdElement.dataset.value;

    fetch('solicituddedatos.php', {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => {
      if (!data || typeof data !== 'object') {
        // Manejar error: respuesta inválida
        console.error('Error: respuesta inválida');
        return;
      }
      if (data.error) {
        // Manejar error: error en la respuesta
        console.error('Error:', data.error);
        return;
      }

      // Mostrar la foto de perfil
      var profilePictureUrl = data.profile_picture;
      var profilePictureElement = document.getElementById('profile-picture');
      if (profilePictureElement) {
        profilePictureElement.src = profilePictureUrl;
      } else {
        console.error('Error: elemento no encontrado');
      }
    })
    .catch(error => console.error('Error:', error));
  } else {
    console.error('Error: elemento no encontrado');
  }
}

// Llamamos a la función para mostrar la foto de perfil cuando se carga el documento
document.addEventListener('DOMContentLoaded', function() {
  showProfilePicture();
});
*/
// Función para cerrar la sesión
function cerrarSesion() {
  fetch('../backend/cerrarsesion.php?cerrar_sesion=true', {
    method: 'POST'
  })
  .then(response => response.json())
  .then(data => {
    if (data.error) {
      console.error('Error:', data.error);
    } else {
      console.log('Sesión cerrada con éxito');
      window.location.href = '../index.php'; 
    }
  })
  .catch(error => console.error('Error:', error));
}
document.addEventListener('DOMContentLoaded', function() {
  document.querySelector('.logout-button').addEventListener('click', cerrarSesion);
});