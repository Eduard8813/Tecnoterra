<html>
 <head>
  <title>
   TecnoTerra
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .header {
            background-color: white;
            padding: 10px 0;
            text-align: center;
            position: relative;
        }
        .header img {
            height: 150px;
        }
        .nav {
            background-color: #3b9e3b;
            padding: 10px 0;
            display: flex;
            justify-content: space-around;
            border-radius: 0 0 20px 20px;
            display: none; 
        }
        .nav a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-size: 18px;
            cursor: pointer;
        }
        .menu-icon {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 24px;
            color: #3b9e3b;
            cursor: pointer;
        }
        .content {
            padding: 20px;
            display: none;
        }
        .content.active {
            display: block;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }

         .container.par {
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: 1fr;
          }

        .container.impar {
        grid-template-columns: repeat(3, 1fr);
        grid-auto-rows: 1fr;
        }
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card h3 {
            font-size: 1.4em;
            color: #0000FF; /* Blue color for field names */
            margin: 0 0 15px 0;
        }
        .card .info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .card .info i {
            margin-right: 10px;
        }
        .card .info span {
            font-size: 1em;
            color: #2c3e50; /* Darker color for variables */
        }
        .card .yield {
            font-size: 1.8em;
            color: #2c3e50; /* Darker color for yield */
            margin-left: auto;
        }
        .card .yield-label {
            font-size: 1.1em;
            color: #2c3e50; /* Darker color for yield label */
            margin-left: 5px;
        }
        .info-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .details {
            text-align: right;
            margin-top: 10px;
        }
        .details a {
            text-decoration: none;
            color: #3498db;
            font-size: 1.1em;
        }
        .green {
            color: green;
        }
        .yellow {
            color: yellow;
        }
        .red {
            color: red;
        }
        @media (min-width: 768px) {
            .container {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        .footer-container {
            width: 100%;
            max-width: 1350px;
            background-color: #3b2314;
            padding: 20px;
            box-sizing: border-box;
            margin-top: 20px;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #3b2314;
            border: 0px solid #ffffff;
        }
        .footer .logo img {
            height: 150px;
        }
        .footer .contact, .footer .links {
            text-align: center;
        }
        .footer .contact h3, .footer .links h3 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #ffffff;
        }
        .footer .contact p, .footer .links p {
            margin: 5px 0;
            font-size: 16px;
            color: #ffffff;
        }
        .footer .contact p i, .footer .links p i {
            margin-right: 10px;
            color: #4caf50;
        }
  </style>
 </head>
 <body>
  <div class="header">
   <img alt="TecnoTerra Logo" height="50" src="nombre.png" width="250"/>
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
   <div class="card" id="frijol">
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
   <div class="card" id="maiz">
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
   <div class="card" id="trigo">
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
   <div class="card" id="cebada">
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
     <img alt="TecnoTerra Logo" src="nombre.png" />
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
  <script>
    const footerContainer = document.querySelector('.footer-container');
    footerContainer.style.display = 'none';
    let firstRun = true;
  function toggleMenu() {
  var navMenu = document.getElementById('navMenu');
  if (navMenu.style.display === 'none' || navMenu.style.display === '') {
    navMenu.style.display = 'flex';
  } else {
    navMenu.style.display = 'none';
  }
}

function showContent(section) {
  var contents = document.getElementsByClassName('content');
  for (var i = 0; i < contents.length; i++) {
    contents[i].style.display = 'none';
  }
  document.getElementById(section).style.display = 'block';
}

function getRandomValue(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function updateCard(cardId) {
  const card = document.getElementById(cardId);
  const status = card.querySelector('.status');
  const temperature = card.querySelector('.temperature');
  const humidity = card.querySelector('.humidity');
  const yieldElement = card.querySelector('.yield');
  const leafIcon = card.querySelector('.fa-leaf');
  const thermometerIcon = card.querySelector('.fa-thermometer-half');
  const tintIcon = card.querySelector('.fa-tint');

  const randomTemperature = getRandomValue(20, 30);
  const randomHumidity = getRandomValue(40, 80);
  const randomYield = (Math.random() * (10 - 2) + 2).toFixed(1);

  temperature.textContent = `${randomTemperature}°C`;
  humidity.textContent = `${randomHumidity}% Humedad`;
  yieldElement.textContent = `${randomYield} t/ha`;

  let statusText = '';
  let colorClass = '';

  if (randomTemperature >= 24 && randomTemperature <= 28 && randomHumidity >= 60 && randomHumidity <= 80) {
    statusText = 'Saludable';
    colorClass = 'green';
  } else if ((randomTemperature >= 22 && randomTemperature < 24) || (randomTemperature > 28 && randomTemperature <= 30) || (randomHumidity >= 50 && randomHumidity < 60) || (randomHumidity > 80 && randomHumidity <= 85)) {
    statusText = 'Moderado';
    colorClass = 'yellow';
  } else {
    statusText = 'Pobre';
    colorClass = 'red';
  }

  status.textContent = statusText;
  status.className = `status ${colorClass}`;
  leafIcon.className = `fas fa-leaf ${colorClass}`;
  thermometerIcon.className = `fas fa-thermometer-half ${colorClass}`;
  tintIcon.className = `fas fa-tint ${colorClass}`;
}

// Ocultar todos los bloques al inicio
const bloques = document.querySelectorAll('.card');
bloques.forEach(bloque => {
  bloque.style.display = 'none';
});

function updateAllCards() {
  // Recibir los datos del cultivo desde el servidor
  fetch('consultacultivo.php')
    .then(response => response.json())
    .then(data => {
      // Ocultar todos los bloques
      const bloques = document.querySelectorAll('.card');
      bloques.forEach(bloque => {
        bloque.style.display = 'none';
      });

      // Obtener la lista de cultivos
      const cultivos = data.cultivo.split(','); // Separar la cadena en un arreglo

      // Mostrar los bloques correspondientes a los cultivos
      cultivos.forEach(cultivo => {
        const bloque = document.getElementById(cultivo.trim().toLowerCase()); // Eliminar espacios en blanco y convertir a minúscula
        if (bloque) {
          bloque.style.display = 'block';
          console.log('si')
          updateCard(cultivo.trim().toLowerCase()); // Llamar a la función updateCard(cardId) con el nombre del cultivo
        } else {
          console.log('No se encontró el bloque con el ID ' + cultivo);
        }
      });

      // Contar el número de bloques
      const numBloques = cultivos.length;

      // Agregar la clase correspondiente al contenedor
      const container = document.querySelector('.container'); 
      if (numBloques % 2 === 0) {
        container.classList.add('par');
        container.classList.remove('impar');
      } else {
        container.classList.add('impar');
        container.classList.remove('par');
      }

      const footerContainer = document.querySelector('.footer-container');
      footerContainer.style.display = 'block';
    })
    .catch(error => console.error('Error:', error));
}
setInterval(updateAllCards, 1000);
  </script>
 </body>
</html>