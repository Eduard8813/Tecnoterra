<html>
 <head>
  <title>
   TecnoTerra
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #333;
        }
        .header {
            background-color: white;
            padding: 10px 0;
            text-align: center;
            position: relative;
        }
        .header img {
            height: 50px;
        }
        .header .menu-icon {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 24px;
            color: green;
            cursor: pointer;
        }
        .nav-bar {
            background-color: #3CB043;
            padding: 10px 0;
            text-align: center;
            border-radius: 0 0 20px 20px;
            display: none;
        }
        .nav-bar a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-size: 18px;
        }
        .sidebar {
            width: 60px;
            background-color: #f8f8f8;
            padding-top: 20px;
            position: fixed;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sidebar .icon {
            font-size: 24px;
            margin: 20px 0;
            color: #888;
            cursor: pointer;
            transition: color 0.3s;
        }
        .sidebar .icon.active {
            color: #4CAF50;
        }
        .content {
            margin-left: 80px;
            padding: 20px;
            text-align: center;
        }
        .content h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .content p {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
        }
        .content .option {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .content .option i {
            font-size: 18px;
            margin-right: 10px;
            color: #888;
        }
        .content .option span {
            font-size: 16px;
            color: #333;
        }
        .content .option-container {
            width: 300px;
            padding: 10px 20px;
            border: 1px solid #ddd;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .content .option-container:hover {
            background-color: #f0f0f0;
            border-color: #ccc;
        }
        .hidden {
            display: none;
        }
        .settings {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .setting-item {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 25px;
            width: 300px;
            padding: 10px 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .setting-item:hover {
            background-color: #f0f0f0;
            border-color: #ccc;
        }
        .setting-item i {
            color: #888;
        }
        .setting-item span {
            flex-grow: 1;
            text-align: left;
            margin-left: 10px;
        }
        .setting-item .toggle {
            width: 40px;
            height: 20px;
            background-color: #4caf50;
            border-radius: 10px;
            position: relative;
            cursor: pointer;
        }
        .setting-item .toggle::before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 16px;
            height: 16px;
            background-color: white;
            border-radius: 50%;
            transition: 0.3s;
        }
        .setting-item .toggle.active::before {
            left: 22px;
        }
        .setting-item select {
            border: none;
            background: none;
            font-size: 16px;
            color: #4a4a4a;
            cursor: pointer;
        }
        .logout-button {
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .logout-button:hover {
            background-color: #002244;
        }
        .edit-button, .save-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .edit-button:hover, .save-button:hover {
            background-color: #388E3C;
        }
        .form-group {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-group input {
            width: 300px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 25px;
            font-size: 16px;
            color: #333;
            outline: none;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            border-color: #4CAF50;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ddd;
            display: block;
            margin: 0 auto 20px;
            background-size: cover;
            background-position: center;
        }
        .profile-pic input {
            display: none;
        }
        .profile-pic label {
            display: block;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
  </style>
  <script>
   function toggleMenu() {
            var navBar = document.querySelector('.nav-bar');
            if (navBar.style.display === 'none' || navBar.style.display === '') {
                navBar.style.display = 'block';
            } else {
                navBar.style.display = 'none';
            }
        }

        function showUserContent() {
            document.getElementById('location-content').classList.add('hidden');
            document.getElementById('settings-content').classList.add('hidden');
            document.getElementById('user-content').classList.remove('hidden');
            setActiveIcon('user-icon');
        }

        function showLocationContent() {
            document.getElementById('user-content').classList.add('hidden');
            document.getElementById('settings-content').classList.add('hidden');
            document.getElementById('location-content').classList.remove('hidden');
            setActiveIcon('location-icon');
        }

        function showSettingsContent() {
            document.getElementById('user-content').classList.add('hidden');
            document.getElementById('location-content').classList.add('hidden');
            document.getElementById('settings-content').classList.remove('hidden');
            setActiveIcon('settings-icon');
        }

        function setActiveIcon(iconId) {
            var icons = document.querySelectorAll('.sidebar .icon');
            icons.forEach(function(icon) {
                icon.classList.remove('active');
            });
            document.getElementById(iconId).classList.add('active');
        }

        function changeLanguage(language) {
            var elements = document.querySelectorAll('[data-lang]');
            elements.forEach(function(element) {
                element.textContent = element.getAttribute('data-lang-' + language);
            });
        }

        function enableEditing(section) {
            var inputs = document.querySelectorAll(`#${section} .form-group input`);
            inputs.forEach(function(input) {
                input.removeAttribute('disabled');
            });
            document.querySelector(`#${section} .edit-button`).classList.add('hidden');
            document.querySelector(`#${section} .save-button`).classList.remove('hidden');
        }

        function saveChanges(section) {
            var inputs = document.querySelectorAll(`#${section} .form-group input`);
            inputs.forEach(function(input) {
                input.setAttribute('disabled', 'disabled');
            });
            document.querySelector(`#${section} .edit-button`).classList.remove('hidden');
            document.querySelector(`#${section} .save-button`).classList.add('hidden');
        }

        function previewProfilePic(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profile-pic');
                output.style.backgroundImage = 'url(' + reader.result + ')';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        document.addEventListener('DOMContentLoaded', function() {
            showUserContent();
        });
  </script>
 </head>
 <body>
  <div class="header">
   <img alt="TecnoTerra Logo" height="50" src="https://oaidalleapiprodscus.blob.core.windows.net/private/org-BVbpSZmLndA7MfHIxv2ahIKS/user-IBY8IaMXtVn7IVIdZeyvjx16/img-wC4SCc5XmxQQCmc4nCUBGETy.png?st=2024-09-22T00%3A17%3A04Z&amp;se=2024-09-22T02%3A17%3A04Z&amp;sp=r&amp;sv=2024-08-04&amp;sr=b&amp;rscd=inline&amp;rsct=image/png&amp;skoid=d505667d-d6c1-4a0a-bac7-5c84a87759f8&amp;sktid=a48cca56-e6da-484e-a814-9c849652bcb3&amp;skt=2024-09-21T23%3A37%3A22Z&amp;ske=2024-09-22T23%3A37%3A22Z&amp;sks=b&amp;skv=2024-08-04&amp;sig=fYLknwT61%2BstZGj16wvdy3odDISFn5/VTvMoPkC5/PY%3D" width="150"/>
   <i class="fas fa-bars menu-icon" onclick="toggleMenu()">
   </i>
  </div>
  <div class="nav-bar">
   <a href="nosotros.html" data-lang data-lang-es="Nosotros" data-lang-en="About Us">
    Nosotros
   </a>
   <a href="usuario.html" data-lang data-lang-es="Usuario" data-lang-en="User">
    Usuario
   </a>
   <a href="chatbot.html" data-lang data-lang-es="Chat Bot" data-lang-en="Chat Bot">
    Chat Bot
   </a>
   <a href="manual.html" data-lang data-lang-es="Manual de uso" data-lang-en="User Manual">
    Manual de uso
   </a>
  </div>
  <div class="sidebar">
   <i class="fas fa-user icon active" id="user-icon" onclick="showUserContent()">
   </i>
   <i class="fas fa-map-marker-alt icon" id="location-icon" onclick="showLocationContent()">
   </i>
   <i class="fas fa-cog icon" id="settings-icon" onclick="showSettingsContent()">
   </i>
  </div>
  <div class="content hidden" id="location-content">
   <h1 data-lang data-lang-es="Localidad" data-lang-en="Location">
    Localidad
   </h1>
   <p data-lang data-lang-es="Gestiona tu información personal aquí" data-lang-en="Manage your personal information here">
    Gestiona tu información personal aquí
   </p>
   <div class="form-group">
    <i class="fas fa-map-marker-alt">
    </i>
    <input data-lang data-lang-es="Dirección" data-lang-en="Address" disabled placeholder="Dirección" type="text" value="Calle Falsa 123"/>
   </div>
   <div class="form-group">
    <i class="fas fa-city">
    </i>
    <input data-lang data-lang-es="Ciudad" data-lang-en="City" disabled placeholder="Ciudad" type="text" value="Ciudad Imaginaria"/>
   </div>
   <div class="form-group">
    <i class="fas fa-map">
    </i>
    <input data-lang data-lang-es="Región" data-lang-en="Region" disabled placeholder="Región" type="text" value="Región Fantástica"/>
   </div>
   <div class="form-group">
    <i class="fas fa-seedling">
    </i>
    <input data-lang data-lang-es="Tamaño del cultivo" data-lang-en="Crop Size" disabled placeholder="Tamaño del cultivo" type="text" value="10 hectáreas"/>
   </div>
   <button class="edit-button" onclick="enableEditing('location-content')" data-lang data-lang-es="Editar" data-lang-en="Edit">
    Editar
   </button>
   <button class="save-button hidden" onclick="saveChanges('location-content')" data-lang data-lang-es="Guardar" data-lang-en="Save">
    Guardar
   </button>
  </div>
  <div class="content" id="user-content">
   <h1 data-lang data-lang-es="Datos Personales" data-lang-en="Personal Data">
    Datos Personales
   </h1>
   <p data-lang data-lang-es="Gestiona tu información personal aquí" data-lang-en="Manage your personal information here">
    Gestiona tu información personal aquí
   </p>
   <div class="profile-pic" id="profile-pic">
    <input accept="image/*" id="profile-pic-input" onchange="previewProfilePic(event)" type="file"/>
    <label for="profile-pic-input">
    </label>
   </div>
   <div class="form-group">
    <i class="fas fa-user">
    </i>
    <input data-lang data-lang-es="Nombre del usuario" data-lang-en="User Name" disabled placeholder="Nombre del usuario" type="text" value="Juan Pérez"/>
   </div>
   <div class="form-group">
    <i class="fas fa-envelope">
    </i>
    <input data-lang data-lang-es="correoimaginario@gmail.com" data-lang-en="imaginaryemail@gmail.com" disabled placeholder="correoimaginario@gmail.com" type="email" value="correoimaginario@gmail.com"/>
   </div>
   <div class="form-group">
    <i class="fas fa-phone">
    </i>
    <input data-lang data-lang-es="+505 0000 0000" data-lang-en="+505 0000 0000" disabled placeholder="+505 0000 0000" type="text" value="+505 0000 0000"/>
   </div>
   <div class="form-group">
    <i class="fas fa-leaf">
    </i>
    <input data-lang data-lang-es="Cultivos del usuario" data-lang-en="User Crops" disabled placeholder="Cultivos del usuario" type="text" value="Maíz, Frijol"/>
   </div>
   <div class="form-group">
    <i class="fas fa-lock">
    </i>
    <input data-lang data-lang-es="Contraseña" data-lang-en="Password" disabled placeholder="Contraseña" type="password" value="password123"/>
   </div>
   <button class="edit-button" onclick="enableEditing('user-content')" data-lang data-lang-es="Editar" data-lang-en="Edit">
    Editar
   </button>
   <button class="save-button hidden" onclick="saveChanges('user-content')" data-lang data-lang-es="Guardar" data-lang-en="Save">
    Guardar
   </button>
  </div>
  <div class="content hidden" id="settings-content">
   <h1 data-lang data-lang-es="Configuración" data-lang-en="Settings">
    Configuración
   </h1>
   <p data-lang data-lang-es="Gestiona tu información personal aquí" data-lang-en="Manage your personal information here">
    Gestiona tu información personal aquí
   </p>
   <div class="settings">
    <div class="setting-item">
     <i class="fas fa-bell">
     </i>
     <span data-lang data-lang-es="Notificaciones" data-lang-en="Notifications">
      Notificaciones
     </span>
     <div class="toggle active">
     </div>
    </div>
    <div class="setting-item">
     <i class="fas fa-language">
     </i>
     <span data-lang data-lang-es="Idioma" data-lang-en="Language">
      Idioma
     </span>
     <select onchange="changeLanguage(this.value)">
      <option value="es">
       Español
      </option>
      <option value="en">
       English
      </option>
     </select>
    </div>
    <div class="setting-item">
     <i class="fas fa-ruler">
     </i>
     <span data-lang data-lang-es="Unidades de medida" data-lang-en="Units of Measure">
      Unidades de medida
     </span>
     <select>
      <option>
       Métrico
      </option>
      <option>
       Imperial
      </option>
     </select>
    </div>
    <button class="logout-button" data-lang data-lang-es="Cerrar sesión" data-lang-en="Log Out">
     Cerrar sesión
    </button>
   </div>
  </div>
 </body>
</html>