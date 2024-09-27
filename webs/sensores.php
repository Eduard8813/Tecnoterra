<html>
 <head>
  <title>
   TecnoTerra
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="../Public/styles/style3.css">
 </head>
 <body>
  <div class="header">
   <img alt="TecnoTerra Logo" height="1000" src="../public/imagenes/nombre.png" width="200"/>
   <i class="fas fa-bars menu-icon" onclick="toggleMenu()">
   </i>
  </div>
  <div class="nav" id="navMenu">
    <a href="sensores.php">Inicio</a>
   <a href="perfil.php">
    Usuario
   </a>
   <a href="chatbot.php">
    Chat Bot
   </a>
  </div>
  <div class="content" id="nosotros">
   <h2>
    Nosotros
   </h2>
   <p>
    Bienvenidos a TecnoTerra. Somos una empresa dedicada a la tecnología y el medio ambiente.
   </p>
  </div>
  <div class="content" id="usuario">
   <h2>
    Usuario
   </h2>
   <p>
    Información del usuario.
   </p>
  </div>
  <div class="content" id="manual">
   <h2>
    Manual de uso
   </h2>
   <p>
    Aquí encontrarás el manual de uso de nuestros productos.
   </p>
  </div>
  <div class="container">
   <div class="card" id="arroz">
    <h3>
     Campo de arroz
    </h3>
    <div class="info-container">
     <div>
      <div class="info">
       <i class="fas fa-leaf">
       </i>
       <span class="status">
        Saludable
       </span>
      </div>
      <div class="info">
       <i class="fas fa-thermometer-half">
       </i>
       <span class="temperature">
        26°C
       </span>
      </div>
      <div class="info">
       <i class="fas fa-tint">
       </i>
       <span class="humidity">
        76% Humedad
       </span>
      </div>
     </div>
     <div>
      <div class="yield">
       8.2 t/ha
      </div>
      <div class="yield-label">
       rendimiento
      </div>
     </div>
    </div>
    <div class="details">
     <a href="grafica.php">
      Detalles
     </a>
    </div>
   </div>
   <div class="card" id="frijoles">
    <h3>
     Campo de frijol
    </h3>
    <div class="info-container">
     <div>
      <div class="info">
       <i class="fas fa-leaf">
       </i>
       <span class="status">
        Moderado
       </span>
      </div>
      <div class="info">
       <i class="fas fa-thermometer-half">
       </i>
       <span class="temperature">
        22°C
       </span>
      </div>
      <div class="info">
       <i class="fas fa-tint">
       </i>
       <span class="humidity">
        60% Humedad
       </span>
      </div>
     </div>
     <div>
      <div class="yield">
       5.1 t/ha
      </div>
      <div class="yield-label">
       rendimiento
      </div>
     </div>
    </div>
    <div class="details">
     <a href="grafica.php">
      Detalles
     </a>
    </div>
   </div>
   <div class="card" id="maíz">
    <h3>
     Campo de maíz
    </h3>
    <div class="info-container">
     <div>
      <div class="info">
       <i class="fas fa-leaf">
       </i>
       <span class="status">
        Pobre
       </span>
      </div>
      <div class="info">
       <i class="fas fa-thermometer-half">
       </i>
       <span class="temperature">
        29°C
       </span>
      </div>
      <div class="info">
       <i class="fas fa-tint">
       </i>
       <span class="humidity">
        40% Humedad
       </span>
      </div>
     </div>
     <div>
      <div class="yield">
       2.9 t/ha
      </div>
      <div class="yield-label">
       rendimiento
      </div>
     </div>
    </div>
    <div class="details">
     <a href="grafica.php">
      Detalles
     </a>
    </div>
   </div>
   <div class="card" id="sorgo">
    <h3>
     Campo de sorgo
    </h3>
    <div class="info-container">
     <div>
      <div class="info">
       <i class="fas fa-leaf">
       </i>
       <span class="status">
        Saludable
       </span>
      </div>
      <div class="info">
       <i class="fas fa-thermometer-half">
       </i>
       <span class="temperature">
        25°C
       </span>
      </div>
      <div class="info">
       <i class="fas fa-tint">
       </i>
       <span class="humidity">
        71% Humedad
       </span>
      </div>
     </div>
     <div>
      <div class="yield">
       7.5 t/ha
      </div>
      <div class="yield-label">
       rendimiento
      </div>
     </div>
    </div>
    <div class="details">
     <a href="grafica.php">
      Detalles
     </a>
    </div>
   </div>
   <div class="card" id="café">
    <h3>
     Campo de trigo
    </h3>
    <div class="info-container">
     <div>
      <div class="info">
       <i class="fas fa-leaf">
       </i>
       <span class="status">
        Bueno
       </span>
      </div>
      <div class="info">
       <i class="fas fa-thermometer-half">
       </i>
       <span class="temperature">
        24°C
       </span>
      </div>
      <div class="info">
       <i class="fas fa-tint">
       </i>
       <span class="humidity">
        65% Humedad
       </span>
      </div>
     </div>
     <div>
      <div class="yield">
       6.8 t/ha
      </div>
      <div class="yield-label">
       rendimiento
      </div>
     </div>
    </div>
    <div class="details">
     <a href="grafica.php">
      Detalles
     </a>
    </div>
   </div>
   <div class="card" id="cacao">
    <h3>
     Campo de cebada
    </h3>
    <div class="info-container">
     <div>
      <div class="info">
       <i class="fas fa-leaf">
       </i>
       <span class="status">
        Regular
       </span>
      </div>
      <div class="info">
       <i class="fas fa-thermometer-half">
       </i>
       <span class="temperature">
        27°C
       </span>
      </div>
      <div class="info">
       <i class="fas fa-tint">
       </i>
       <span class="humidity">
        55% Humedad
       </span>
      </div>
     </div>
     <div>
      <div class="yield">
       4.3 t/ha
      </div>
      <div class="yield-label">
       rendimiento
      </div>
     </div>
    </div>
    <div class="details">
     <a href="grafica.php">
      Detalles
     </a>
    </div>
   </div>
  </div>
  <div class="footer-container">
   <div class="footer">
    <div class="logo">
     <img alt="TecnoTerra Logo" src="../public/imagenes/nombre.png" />
    </div>
    <div class="contact">
     <h3>
      Contacto
     </h3>
     <p>
      <i class="fas fa-phone">
      </i>
      8900 - 7093
     </p>
     <p>
      <i class="fas fa-envelope">
      </i>
      tecnoterra88@gmail.com
     </p>
    </div>
    <div class="links">
     <h3>
      Enlaces
     </h3>
     <p>
      <a href="chatbot.php" style="color: #ffffff; text-decoration: none;">
       Chat Bot
      </a>
     </p>
    </div>
   </div>
  </div>
     <script src = "../src/funcionamiento/src3.js"></script>
 </body>
</html>