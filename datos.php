<html>
 <head>
  <title>
   TecnoTerra
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            width: 100%;
            background-color: #fff;
            padding: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .header img {
            height: 100px;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 50px;
            text-align: center;
            width: 400px;
        }
        .container h2 {
            font-size: 18px;
            color: #004d40;
            margin-bottom: 30px;
        }
        .input-group {
            margin-bottom: 20px;
            position: relative;
        }
        .input-group input {
            width: 100%;
            padding: 10px 10px 10px 40px;
            border: 1px solid #ccc;
            border-radius: 25px;
            font-size: 14px;
        }
        .input-group .fa-map-marker-alt {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #ccc;
        }
        .button {
            background-color: #004d40;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-size: 14px;
            cursor: pointer;
        }
  </style>
 </head>
 <body>
  <div class="header">
    <img alt="TecnoTerra Logo" height="150" src="nombre.png" width="200"/>
  </div>
  <div class="container">
    <h2>Antes de continuar necesitamos un poco más de información</h2>
    <form id="myForm">
      <div class="input-group">
        <i class="fas fa-map-marker-alt"></i>
        <input placeholder="Ciudad" type="text" name="city"/>
      </div>
      <div class="input-group">
        <i class="fas fa-map-marker-alt"></i>
        <input placeholder="Región" type="text" name="region"/>
      </div>
      <div class="input-group">
        <i class="fas fa-map-marker-alt"></i>
        <input placeholder="Tamaño del área a monitorear" type="text" name="area_size"/>
      </div>
    <button class="button" type="button" onclick="submitForm()">Siguiente</button>
    </form>
  </div>

  <<script>
  function submitForm() {
    var form = document.getElementById("myForm");
    var formData = new FormData(form);
    fetch('datosfinales.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      console.log(data)
      if (data.Respuesta) {
        window.location.href = "sensores.php"; 
      }
    })
    .catch(error => console.error(error));
  }
</script>
</body>
</html>