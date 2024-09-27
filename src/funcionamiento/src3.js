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
    fetch('../backend/consultacultivo.php')
        .then(response => response.json())
        .then(data => {
            // Ocultar todos los bloques
            const bloques = document.querySelectorAll('.card');
            bloques.forEach(bloque => {
                bloque.style.display = 'none';
            });

            // Obtener la lista de cultivos
            const cultivos = data.cultivo.split(/[,\s]+/); // Split by commas and one or more spaces
            
            // Mostrar los bloques correspondientes a los cultivos
            cultivos.forEach(cultivo => {
                const bloque = document.getElementById(cultivo.trim().toLowerCase()); // Eliminar espacios en blanco y convertir a minúscula
                if (bloque) {
                    bloque.style.display = 'block';
                    console.log(cultivo)
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