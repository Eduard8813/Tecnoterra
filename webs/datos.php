<html>
 <head>
  <title>
   TecnoTerra
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="../Public/styles/style2.css">
 </head>
 <body>
   <script src = "../src/funcionamiento/scr2.js"></script>
  <div class="header">
    <img alt="TecnoTerra Logo" height="150" src="../public/imagenes/nombre.png" width="200"/>
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
</body>
</html>