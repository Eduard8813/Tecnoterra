<html>
 <head>
  <title>
   TecnoTerra
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="../Public/styles/style4.css">
 </head>
 <body>
  <div class="header">
   <img alt="TecnoTerra Logo" height="50" src="../public/imagenes/nombre.png" width="200"/>
   <i class="fas fa-bars menu-icon" onclick="toggleMenu()">
   </i>
  </div>
  <div class="nav-bar">
    <a href="sensores.php">Inicio</a>
   <a href="perfil.php" data-lang data-lang-es="Usuario" data-lang-en="User">
    Usuario
   </a>
   <a href="chatbot.php" data-lang data-lang-es="Chat Bot" data-lang-en="Chat Bot">
    Chat Bot
   </a>
  </div>
  <div id="user-id" data-value="<?php echo $_SESSION['user_id']; ?>"></div>
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
    <input id = "direccion" data-lang data-lang-es="Dirección" data-lang-en="Address" disabled placeholder="Dirección" type="text" value=""/>
   </div>
   <div class="form-group">
    <i class="fas fa-city">
    </i>
    <input id = "cuidad" data-lang data-lang-es="Ciudad" data-lang-en="City" disabled placeholder="Ciudad" type="text" value=""/>
   </div>
   <div class="form-group">
    <i class="fas fa-map">
    </i>
    <input id = "region" data-lang data-lang-es="Región" data-lang-en="Region" disabled placeholder="Región" type="text" value=""/>
   </div>
   <div class="form-group">
    <i class="fas fa-seedling">
    </i>
    <input id = "area" data-lang data-lang-es="Tamaño del cultivo" data-lang-en="Crop Size" disabled placeholder="Tamaño del cultivo" type="text" value=""/>
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
   <div class="form-group">
    <i class="fas fa-user">
    </i>
    <input id = "usuario" data-lang data-lang-es="Nombre del usuario" data-lang-en="User Name" disabled placeholder="Nombre del usuario" type="text" value=""/>
   </div>
   <div class="form-group">
    <i class="fas fa-envelope">
    </i>
    <input id = "correo" data-lang data-lang-es="correoimaginario@gmail.com" data-lang-en="imaginaryemail@gmail.com" disabled placeholder="correoimaginario@gmail.com" type="email" value=""/>
   </div>
   <div class="form-group">
    <i class="fas fa-phone">
    </i>
    <input id = "numero" data-lang data-lang-es="+505 0000 0000" data-lang-en="+505 0000 0000" disabled placeholder="+505 0000 0000" type="text" value=""/>
   </div>
   <div class="form-group">
    <i class="fas fa-leaf">
    </i>
    <input id = "cultivo" data-lang data-lang-es="Cultivos del usuario" data-lang-en="User Crops" disabled placeholder="Cultivos del usuario" type="text" value=""/>
   </div>
   <div class="form-group">
    <i class="fas fa-lock">
    </i>
    <input id = "contraseña" data-lang data-lang-es="Contraseña" data-lang-en="Password" disabled placeholder="Contraseña" type="password" value=""/>
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
    <button id = "logout-button"class="logout-button" data-lang data-lang-es="Cerrar sesión" data-lang-en="Log Out">
     Cerrar sesión
    </button>
   </div>
  </div>
   <script src = "../src/funcionamiento/src4.js"></script>
 </body>
</html>