<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroAmigo</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="contenedor">
        <header>
            <h1>AgroAmigo</h1>
        </header>
       <section class="chat">
                <div class="mensajes" id="mensajes">
                    <div class="mensaje" id="mensaje-inicial">
                        <p>Hola! Soy AgroAmigo. ¿En qué puedo ayudarte hoy?</p>
                    </div>
                </div>
                <form id="formulario">
                    <input type="text" id="entrada" placeholder="Escribe tu mensaje...">
                    <button id="enviar">Enviar</button>
                </form>
        </main>
    </div>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.contenedor {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

main {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
}

.chat {
    width: 80%;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.mensajes {
    padding: 20px;
}

.mensaje {
    margin-bottom: 10px;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.mensaje p {
    margin: 0;
    padding: 10px;
}

.formulario {
    margin-top: 20px;
}

#entrada {
    width: 80%;
    height: 40px;
    padding: 10px;
    font-size: 18px;
    border: 1px solid #ddd;
    border-radius: 10px;
}

#enviar {
    width: 20%;
    height: 40px;
    padding: 10px;
    font-size: 18px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
}

#enviar:hover {
    background-color: #555;
}

.informacion {
    margin-top: 20px;
}

.informacion ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.informacion li {
    margin-bottom: 10px;
}

.informacion a {
    text-decoration: none;
    color: #333;
}

.informacion a:hover {
    color: #555;
}
    </style>
    <script>
      const mensajes = document.getElementById('mensajes');
        const entrada = document.getElementById('entrada');
        const enviar = document.getElementById('enviar');

        const respuestas = {
            'arroz': 'El arroz requiere un suelo con pH entre 5,5 y 6,5 y niveles de nitrógeno, fósforo y potasio adecuados.',
            'frijoles': 'Los frijoles requieren un suelo con pH entre 6,0 y 7,0 y niveles de nitrógeno, fósforo y potasio adecuados.',
            'maiz': 'El maíz requiere un suelo con pH entre 6,0 y 7,0 y niveles de nitrógeno, fósforo y potasio adecuados.',
            'sorgo': 'El sorgo requiere un suelo con pH entre 6,0 y 7,0 y niveles de nitrógeno, fósforo y potasio adecuados.',
            'cafe': 'El café requiere un suelo con pH entre 5,5 y 6,5 y niveles de nitrógeno, fósforo y potasio adecuados.',
            'cacao': 'El cacao requiere un suelo con pH entre 6,0 y 7,0 y niveles de nitrógeno, fósforo y potasio adecuados.',
            'que es la fertilidad del suelo': 'La fertilidad del suelo se refiere a la capacidad del suelo para proporcionar nutrientes esenciales para el crecimiento de las plantas.',
            'como mejorar la fertilidad del suelo': 'Se puede mejorar la fertilidad del suelo mediante la adición de materia orgánica, la rotación de cultivos y la aplicación de fertilizantes.',
            'sugerencias para arroz': 'Para mejorar la producción de arroz, se recomienda utilizar variedades resistentes a enfermedades y plagas, y aplicar técnicas de riego eficientes.',
            'sugerencias para frijoles': 'Para mejorar la producción de frijoles, se recomienda utilizar variedades resistentes a enfermedades y plagas, y aplicar técnicas de riego eficientes.',
            'sugerencias para maiz': 'Para mejorar la producción de maíz, se recomienda utilizar variedades resistentes a enfermedades y plagas, y aplicar técnicas de riego eficientes.',
            'sugerencias para sorgo': 'Para mejorar la producción de sorgo, se recomienda utilizar variedades resistentes a enfermedades y plagas, y aplicar técnicas de riego eficientes.',
            'sugerencias para cafe': 'Para mejorar la producción de café, se recomienda utilizar variedades resistentes a enfermedades y plagas, y aplicar técnicas de riego eficientes.',
            'sugerencias para cacao': 'Para mejorar la producción de cacao, se recomienda utilizar variedades resistentes a enfermedades y plagas, y aplicar técnicas de riego eficientes.',
        };

        enviar.addEventListener('click', (e) => {
            e.preventDefault();
            const mensaje = entrada.value.trim().toLowerCase();
            const respuesta = respuestas[mensaje];

            if (respuesta) {
                const mensajeElement = document.createElement('div');
                mensajeElement.classList.add('mensaje');
                mensajeElement.innerHTML = `<p>Tú: ${mensaje}</p><p>AgroAmigo: ${respuesta}</p>`;
                mensajes.appendChild(mensajeElement);
            } else {
                const mensajeElement = document.createElement('div');
                mensajeElement.classList.add('mensaje');
                mensajeElement.innerHTML = `<p>Tú: ${mensaje}</p><p>AgroAmigo: Lo siento, no tengo información sobre eso.</p>`;
                mensajes.appendChild(mensajeElement);
            }

            entrada.value = '';
        });

        document.querySelectorAll('.informacion a').forEach((link) => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const cultivo = link.textContent.toLowerCase();
                const respuesta = respuestas[cultivo];

                if (respuesta) {
                    const mensajeElement = document.createElement('div');
                    mensajeElement.classList.add('mensaje');
                    mensajeElement.innerHTML = `<p>AgroAmigo: ${respuesta}</p>`;
                    mensajes.appendChild(mensajeElement);
                }
            });
        });

    </script>
</body>
</html>