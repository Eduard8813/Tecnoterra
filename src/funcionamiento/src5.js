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