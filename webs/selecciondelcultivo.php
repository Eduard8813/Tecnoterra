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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .header {
            width: 100%;
            background-color: white;
            padding: 20px 0;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
            position: absolute;
            top: 0;
            border-radius: 0 0 10px 10px;
        }
        .header img {
            height: 100px;
        }
        .content {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            width: 400px;
            margin-top: 100px;
        }
        .content h2 {
            color: #0a3d62;
            font-size: 24px;
            margin-bottom: 30px;
        }
        .content ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .content ul li {
            display: flex;
            align-items: center;
            width: 45%;
            margin-bottom: 20px;
            cursor: pointer;
            font-size: 18px;
        }
        .content ul li i {
            color: #27ae60;
            margin-right: 10px;
        }
        .content ul li.checked i {
            color: #27ae60;
        }
        .content ul li.checked::after {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: #27ae60;
            margin-left: auto;
        }
        .next-button {
            margin-top: 30px;
            padding: 15px 30px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        .next-button:hover {
            background-color: #219150;
        }
  </style>
 </head>
 <body>
  <div class="header">
   <img alt="TecnoTerra Logo" height="200" src="../Public/imagenes/nombre.png" width="200"/>
  </div>
  <div class="content">
  <h2>
    Selecciona el o los tipos de cultivos con los que trabajas
  </h2>
  <form id="cultivos-form">
    <ul>
      <li>
        <i class="fas fa-leaf"></i>
        Frijoles
        <input type="checkbox" name="cultivos[]" value="Frijoles">
      </li>
      <li>
        <i class="fas fa-leaf"></i>
        Arroz
        <input type="checkbox" name="cultivos[]" value="Arroz">
      </li>
      <li>
        <i class="fas fa-leaf"></i>
        Cacao
        <input type="checkbox" name="cultivos[]" value="Cacao">
      </li>
      <li>
        <i class="fas fa-leaf"></i>
        Maíz
        <input type="checkbox" name="cultivos[]" value="Maíz">
      </li>
      <li>
        <i class="fas fa-leaf"></i>
        Sorgo
        <input type="checkbox" name="cultivos[]" value="Sorgo">
      </li>
      <li>
        <i class="fas fa-leaf"></i>
        Café
        <input type="checkbox" name="cultivos[]" value="Café">
      </li>
    </ul>
    <button class="next-button" type="submit">
      Siguiente
    </button>
  </form>
  <script>
  const form = document.getElementById('cultivos-form');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const cultivos = [];
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

    checkboxes.forEach((checkbox) => {
      cultivos.push(checkbox.value);
    });

    const data = { cultivos };

    fetch('../backend/cultivos.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then((data) => {
      console.log(data);
      if (data.Respuesta) {
         window.location.href = '../backend/consultadedatos.php';
      } else {
        // Handle error response
      }
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  });
</script>
  </script>
</div>
 </body>
</html>