<html>
<head>
    <title>TecnoTerra</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
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
        .menu-icon {
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
            display: flex;
            justify-content: center;
            border-radius: 0 0 20px 20px;
            display: none; /* Initially hidden */
        }
        .nav-bar a {
            color: white;
            text-decoration: none;
            margin: 0 100px;
            font-size: 18px;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        .item {
            margin: 20px;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 200px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .item:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        }
        .item i {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .item p {
            margin: 5px 0;
            font-size: 18px;
            color: #2c3e50;
        }
        .assistant {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            width: 90%;
            max-width: 800px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            text-align: left;
            position: relative;
        }
        .assistant h3 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .assistant p {
            font-size: 18px;
            color: #7f8c8d;
            line-height: 1.6;
        }
        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            width: 100%;
        }
        .chart {
            width: 90%;
            max-width: 800px;
        }
        .text-container {
            text-align: left;
            margin: 0 auto;
            width: 90%;
            max-width: 800px;
        }
        .text-container h2 {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .text-container p {
            font-size: 18px;
            color: #7f8c8d;
            line-height: 1.6;
        }
        .chatbot-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .chatbot-link:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="header">
        <img alt="TecnoTerra Logo" src="nombre.png" width="250"/>
        <i class="fas fa-bars menu-icon" onclick="toggleNavBar()"></i>
    </div>
    <div class="nav-bar" id="navBar">
        <a href="nosotros.html">Nosotros</a>
        <a href="usuario.html">Usuario</a>
        <a href="chatbot.html">Chat Bot</a>
        <a href="manual.html">Manual de uso</a>
    </div>
    <div class="content">
        <div class="container">
            <div class="item">
                <i class="fas fa-seedling" id="estado-cultivo-icon"></i>
                <p id="estado-cultivo">Pobre</p>
                <p>Estado del cultivo</p>
            </div>
            <div class="item">
                <i class="fas fa-thermometer-half" id="temperatura-icon"></i>
                <p id="temperatura">26°C</p>
                <p>Temperatura</p>
            </div>
            <div class="item">
                <i class="fas fa-tint" id="humedad-icon"></i>
                <p id="humedad">30%</p>
                <p>Humedad</p>
            </div>
        </div>
        <div class="container">
            <div class="item">
                <i class="fas fa-water" id="tension-agua-icon"></i>
                <p id="tension-agua">50 kPa</p>
                <p>Tensión del agua en el suelo</p>
            </div>
            <div class="item">
                <i class="fas fa-bug" id="actividad-microbiana-icon"></i>
                <p id="actividad-microbiana">Alta</p>
                <p>Actividad microbiana</p>
            </div>
            <div class="item">
                <i class="fas fa-wind" id="perdida-agua-icon"></i>
                <p id="perdida-agua">20%</p>
                <p>Pérdida de agua por evaporación</p>
            </div>
        </div>
        <div class="assistant" id="assistant">
            <h3>Asistente de Cultivo</h3>
            <p id="assistant-text">Aquí encontrarás recomendaciones para mejorar el estado de tus cultivos.</p>
            <a href="chatbot.html" class="chatbot-link">Chatbot</a>
        </div>
        <div class="chart-container">
            <canvas id="myChart" class="chart"></canvas>
        </div>
        <div class="text-container">
            <h2>Gráficas y datos</h2>
            <p>Aquí podrás encontrar un registro de los datos almacenados de tu cultivo representados de manera visual.</p>
        </div>
    </div>
    <script>
        function toggleNavBar() {
            var navBar = document.getElementById('navBar');
            if (navBar.style.display === 'none' || navBar.style.display === '') {
                navBar.style.display = 'flex';
            } else {
                navBar.style.display = 'none';
            }
        }

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo'],
                datasets: [
                    {
                        label: 'Estado del suelo',
                        data: [5, 10, 15],
                        backgroundColor: '#27ae60',
                        borderColor: '#27ae60',
                        borderWidth: 1,
                        hoverBackgroundColor: '#2ecc71',
                        hoverBorderColor: '#2ecc71'
                    },
                    {
                        label: 'Temperatura',
                        data: [26, 27, 28],
                        backgroundColor: '#2980b9',
                        borderColor: '#2980b9',
                        borderWidth: 1,
                        hoverBackgroundColor: '#3498db',
                        hoverBorderColor: '#3498db'
                    },
                    {
                        label: 'Humedad',
                        data: [30, 35, 40],
                        backgroundColor: '#e74c3c',
                        borderColor: '#e74c3c',
                        borderWidth: 1,
                        hoverBackgroundColor: '#c0392b',
                        hoverBorderColor: '#c0392b'
                    },
                    {
                        label: 'Tensión del agua en el suelo',
                        data: [50, 55, 60],
                        backgroundColor: '#8e44ad',
                        borderColor: '#8e44ad',
                        borderWidth: 1,
                        hoverBackgroundColor: '#9b59b6',
                        hoverBorderColor: '#9b59b6'
                    },
                    {
                        label: 'Actividad microbiana',
                        data: [70, 75, 80],
                        backgroundColor: '#f39c12',
                        borderColor: '#f39c12',
                        borderWidth: 1,
                        hoverBackgroundColor: '#e67e22',
                        hoverBorderColor: '#e67e22'
                    },
                    {
                        label: 'Pérdida de agua por evaporación',
                        data: [20, 25, 30],
                        backgroundColor: '#c0392b',
                        borderColor: '#c0392b',
                        borderWidth: 1,
                        hoverBackgroundColor: '#e74c3c',
                        hoverBorderColor: '#e74c3c'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 16
                        },
                        bodyFont: {
                            size: 14
                        },
                        footerFont: {
                            size: 12
                        }
                    }
                }
            }
        });

        const months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        let currentMonthIndex = 0;

        function updateCardColor(element, value, thresholds) {
            if (value < thresholds.low) {
                element.style.color = 'red';
            } else if (value < thresholds.high) {
                element.style.color = 'yellow';
            } else {
                element.style.color = 'green';
            }
        }

        function updateAssistant() {
            const estadoCultivo = parseInt(document.getElementById('estado-cultivo').innerText);
            const temperatura = parseInt(document.getElementById('temperatura').innerText);
            const humedad = parseInt(document.getElementById('humedad').innerText);
            const tensionAgua = parseInt(document.getElementById('tension-agua').innerText);
            const actividadMicrobiana = document.getElementById('actividad-microbiana').innerText;
            const perdidaAgua = parseInt(document.getElementById('perdida-agua').innerText);

            let advice = "Aquí encontrarás recomendaciones para mejorar el estado de tus cultivos.";

            if (estadoCultivo < 33) {
                advice += " El estado del cultivo es pobre. Considera mejorar la fertilización y el riego.";
            } else if (estadoCultivo < 66) {
                advice += " El estado del cultivo es regular. Mantén un monitoreo constante.";
            } else {
                advice += " El estado del cultivo es bueno. Sigue con las buenas prácticas.";
            }

            if (temperatura < 15) {
                advice += " La temperatura es baja. Considera usar cobertores para mantener el calor.";
            } else if (temperatura > 30) {
                advice += " La temperatura es alta. Asegúrate de que las plantas tengan suficiente agua.";
            }

            if (humedad < 33) {
                advice += " La humedad es baja. Aumenta la frecuencia de riego.";
            } else if (humedad > 66) {
                advice += " La humedad es alta. Asegúrate de que el suelo drene bien.";
            }

            if (tensionAgua > 60) {
                advice += " La tensión del agua es alta. Aumenta la cantidad de riego.";
            }

            if (actividadMicrobiana === 'Baja') {
                advice += " La actividad microbiana es baja. Considera agregar compost o microorganismos beneficiosos.";
            }

            if (perdidaAgua > 50) {
                advice += " La pérdida de agua por evaporación es alta. Usa cobertores de suelo para reducir la evaporación.";
            }

            document.getElementById('assistant-text').innerText = advice;
        }

        // Simulate data update
        setInterval(() => {
            const estadoCultivo = Math.floor(Math.random() * 100);
            const temperatura = Math.floor(Math.random() * 40);
            const humedad = Math.floor(Math.random() * 100);
            const tensionAgua = Math.floor(Math.random() * 100);
            const actividadMicrobiana = Math.random() > 0.5 ? 'Alta' : 'Baja';
            const perdidaAgua = Math.floor(Math.random() * 100);

            document.getElementById('estado-cultivo').innerText = estadoCultivo + '%';
            document.getElementById('temperatura').innerText = temperatura + '°C';
            document.getElementById('humedad').innerText = humedad + '%';
            document.getElementById('tension-agua').innerText = tensionAgua + ' kPa';
            document.getElementById('actividad-microbiana').innerText = actividadMicrobiana;
            document.getElementById('perdida-agua').innerText = perdidaAgua + '%';

            updateCardColor(document.getElementById('estado-cultivo-icon'), estadoCultivo, { low: 33, high: 66 });
            updateCardColor(document.getElementById('temperatura-icon'), temperatura, { low: 15, high: 30 });
            updateCardColor(document.getElementById('humedad-icon'), humedad, { low: 33, high: 66 });
            updateCardColor(document.getElementById('tension-agua-icon'), tensionAgua, { low: 33, high: 66 });
            updateCardColor(document.getElementById('actividad-microbiana-icon'), actividadMicrobiana === 'Alta' ? 100 : 0, { low: 50, high: 100 });
            updateCardColor(document.getElementById('perdida-agua-icon'), perdidaAgua, { low: 33, high: 66 });

            updateAssistant();

            myChart.data.labels = months.slice(currentMonthIndex, currentMonthIndex + 3);
            myChart.data.datasets[0].data = [Math.floor(Math.random() * 100), Math.floor(Math.random() * 100), Math.floor(Math.random() * 100)];
            myChart.data.datasets[1].data = [Math.floor(Math.random() * 40), Math.floor(Math.random() * 40), Math.floor(Math.random() * 40)];
            myChart.data.datasets[2].data = [Math.floor(Math.random() * 100), Math.floor(Math.random() * 100), Math.floor(Math.random() * 100)];
            myChart.data.datasets[3].data = [Math.floor(Math.random() * 100), Math.floor(Math.random() * 100), Math.floor(Math.random() * 100)];
            myChart.data.datasets[4].data = [Math.floor(Math.random() * 100), Math.floor(Math.random() * 100), Math.floor(Math.random() * 100)];
            myChart.data.datasets[5].data = [Math.floor(Math.random() * 100), Math.floor(Math.random() * 100), Math.floor(Math.random() * 100)];
            myChart.update();

            currentMonthIndex = (currentMonthIndex + 1) % 10;
        }, 5000);
    </script>
</body>
</html>