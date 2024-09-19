<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo de Cultivos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #e0f7fa;
            /* Azul claro */
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #388e3c;
            /* Verde */
            color: white;
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .card {
            background-color: #d7ccc8;
            /* Marrón claro */
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 16px;
            /* Ensure space between cards */
        }

        .card h2 {
            font-size: 1.125rem;
            font-weight: bold;
        }

        .card .details {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.875rem;
            color: #4b5563;
        }

        .card .details i {
            color: #10b981;
        }

        .card .details .temp {
            color: #3b82f6;
        }

        .card .details .humidity {
            color: #60a5fa;
        }

        .card .yield {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 8px;
        }

        .card .yield-label {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .menu {
            display: none;
            flex-direction: column;
            gap: 8px;
            background-color: #d7ccc8;
            /* Marrón claro */
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .menu a {
            color: #388e3c;
            /* Verde */
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
        }

        .content {
            display: none;
            background-color: #d7ccc8;
            /* Marrón claro */
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .content p {
            font-size: 1rem;
            color: #374151;
        }

        .content button {
            background-color: #388e3c;
            /* Verde */
            color: white;
            padding: 8px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            margin-top: 16px;
        }

        .chat-container {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-top: 16px;
        }

        .chat-box {
            background-color: #fff;
            padding: 8px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            max-height: 300px;
            overflow-y: auto;
        }

        .chat-input {
            display: flex;
            gap: 8px;
        }

        .chat-input input {
            flex: 1;
            padding: 8px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }

        .chat-input button {
            padding: 8px;
            background-color: #388e3c;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .message {
            margin-bottom: 8px;
        }

        .message.user {
            text-align: right;
        }

        .message.bot {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Monitoreo de Cultivos</h1>
        <i class="fas fa-bars" onclick="toggleMenu()"></i>
    </div>
    <div class="menu" id="menu">
        <a onclick="showContent('perfil')">Perfil</a>
        <a onclick="showContent('instrucciones')">Instrucciones</a>
        <a onclick="showContent('quienes-somos')">Quiénes Somos</a>
    </div>
    <div class="container" id="main-content">
        <div class="card">
            <h2>Campo de Arroz</h2>
            <div class="details">
                <i class="fas fa-leaf"></i>
                <span>Saludable</span>
                <i class="fas fa-thermometer-half temp"></i>
                <span id="temp-arroz">25°C</span>
                <i class="fas fa-tint humidity"></i>
                <span id="humedad-arroz">75% Humedad</span>
            </div>
            <div class="yield">8.2 t/ha</div>
            <div class="yield-label">Rendimiento</div>
        </div>
        <div class="card">
            <h2>Campo de Maíz</h2>
            <div class="details">
                <i class="fas fa-leaf" style="color: #fbbf24;"></i>
                <span>Moderado</span>
                <i class="fas fa-thermometer-half temp"></i>
                <span id="temp-maiz">28°C</span>
                <i class="fas fa-tint humidity"></i>
                <span id="humedad-maiz">65% Humedad</span>
            </div>
            <div class="yield">2.9 t/ha</div>
            <div class="yield-label">Rendimiento</div>
        </div>
        <div class="card">
            <h2>Campo de Frijol</h2>
            <div class="details">
                <i class="fas fa-leaf" style="color: #ef4444;"></i>
                <span>Pobre</span>
                <i class="fas fa-thermometer-half temp"></i>
                <span id="temp-frijol">22°C</span>
                <i class="fas fa-tint humidity"></i>
                <span id="humedad-frijol">80% Humedad</span>
            </div>
            <div class="yield">5.1 t/ha</div>
            <div class="yield-label">Rendimiento</div>
        </div>
        <div class="card">
            <h2>Campo de Sorgo</h2>
            <div class="details">
                <i class="fas fa-leaf"></i>
                <span>Saludable</span>
                <i class="fas fa-thermometer-half temp"></i>
                <span id="temp-sorgo">26°C</span>
                <i class="fas fa-tint humidity"></i>
                <span id="humedad-sorgo">70% Humedad</span>
            </div>
            <div class="yield">6.5 t/ha</div>
            <div class="yield-label">Rendimiento</div>
        </div>
        <div class="card">
            <h2>Campo de Café</h2>
            <div class="details">
                <i class="fas fa-leaf" style="color: #fbbf24;"></i>
                <span>Moderado</span>
                <i class="fas fa-thermometer-half temp"></i>
                <span id="temp-cafe">24°C</span>
                <i class="fas fa-tint humidity"></i>
                <span id="humedad-cafe">60% Humedad</span>
            </div>
            <div class="yield">3.2 t/ha</div>
            <div class="yield-label">Rendimiento</div>
        </div>
        <div class="card">
            <h2>Campo de Cacao</h2>
            <div class="details">
                <i class="fas fa-leaf" style="color: #ef4444;"></i>
                <span>Pobre</span>
                <i class="fas fa-thermometer-half temp"></i>
                <span id="temp-cacao">27°C</span>
                <i class="fas fa-tint humidity"></i>
                <span id="humedad-cacao">85% Humedad</span>
            </div>
            <div class="yield">4.8 t/ha</div>
            <div class="yield-label">Rendimiento</div>
        </div>
    </div>
    <div class="content" id="perfil">
        <p>Esta es la sección de perfil...</p>
        <button onclick="hideContent()">Volver</button>
    </div>
    <div class="content" id="instrucciones">
        <p>Estas son las instrucciones para el uso de la aplicación de monitoreo de cultivos...</p>
        <div class="chat-container">
            <div class="chat-box" id="chat-box">
                <!-- Chat messages will appear here -->
            </div>
            <div class="chat-input">
                <input type="text" id="chat-input" placeholder="Escribe tu pregunta...">
                <button onclick="sendMessage()">Enviar</button>
            </div>
        </div>
        <button onclick="hideContent()">Volver</button>
    </div>
    <div class="content" id="quienes-somos">
        <p>Somos un equipo dedicado a mejorar la eficiencia y productividad de los cultivos a través de la tecnología...
        </p>
        <button onclick="hideContent()">Volver</button>
    </div>
    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            const mainContent = document.getElementById('main-content');
            const contents = document.querySelectorAll('.content');
            menu.style.display = menu.style.display === 'none' || menu.style.display === '' ? 'flex' : 'none';
            mainContent.style.display = 'none';
            contents.forEach(content => content.style.display = 'none');
        }

        function showContent(contentId) {
            document.getElementById('menu').style.display = 'none';
            document.getElementById(contentId).style.display = 'block';
        }

        function hideContent() {
            document.getElementById('main-content').style.display = 'flex';
            document.querySelectorAll('.content').forEach(content => content.style.display = 'none');
        }

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function updateReadings() {
            document.getElementById('temp-arroz').innerText = `${getRandomInt(24, 26)}°C`;
            document.getElementById('humedad-arroz').innerText = `${getRandomInt(74, 76)}% Humedad`;
            document.getElementById('temp-maiz').innerText = `${getRandomInt(27, 29)}°C`;
            document.getElementById('humedad-maiz').innerText = `${getRandomInt(64, 66)}% Humedad`;
            document.getElementById('temp-frijol').innerText = `${getRandomInt(21, 23)}°C`;
            document.getElementById('humedad-frijol').innerText = `${getRandomInt(79, 81)}% Humedad`;
            document.getElementById('temp-sorgo').innerText = `${getRandomInt(25, 27)}°C`;
            document.getElementById('humedad-sorgo').innerText = `${getRandomInt(69, 71)}% Humedad`;
            document.getElementById('temp-cafe').innerText = `${getRandomInt(23, 25)}°C`;
            document.getElementById('humedad-cafe').innerText = `${getRandomInt(59, 61)}% Humedad`;
            document.getElementById('temp-cacao').innerText = `${getRandomInt(26, 28)}°C`;
            document.getElementById('humedad-cacao').innerText = `${getRandomInt(84, 86)}% Humedad`;
        }

        setInterval(updateReadings, 5000);
        updateReadings();

        function sendMessage() {
            const input = document.getElementById('chat-input');
            const message = input.value.trim();
            if (message) {
                addMessage('user', message);
                getBotResponse(message);
                input.value = '';
            }
        }

        function addMessage(sender, message) {
            const chatBox = document.getElementById('chat-box');
            const messageElement = document.createElement('div');
            messageElement.classList.add('message', sender);
            messageElement.innerText = message;
            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        function getBotResponse(message) {
            let response = '';
            if (message.toLowerCase().includes('hola')) {
                response = '¡Hola! ¿En qué puedo ayudarte?';
            } else if (message.toLowerCase().includes('rendimiento')) {
                response = 'El rendimiento de los cultivos se mide en toneladas por hectárea (t/ha).';
            } else if (message.toLowerCase().includes('temperatura')) {
                response = 'La temperatura ideal para el cultivo de arroz es entre 24°C y 26°C.';
            } else {
                response = 'Lo siento, no entiendo tu pregunta. Por favor, intenta de nuevo.';
            }
            addMessage('bot', response);
        }
    </script>
</body>

</html>