function generarjsonDatosLiderazgo() {
    console.log('Iniciando generación de JSON de datos de liderazgo...');

    fetch('../data_liderazgo.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        console.log('Respuesta recibida:', response);
        if (!response.ok) {
            throw new Error('Error en la solicitud');
        }
        return response.json();
    })
    .then(data => {
        console.log('Datos recibidos correctamente:', data);
        mostrarPreguntas(data.data); // Mostrar los datos recibidos
    })
    .catch(error => {
        console.error('Error al generar JSON de datos de liderazgo:', error);
        const errorContainer = document.createElement('div');
        errorContainer.innerText = 'Error al generar JSON de datos de liderazgo: ' + error.message;
        document.body.appendChild(errorContainer);
    });
}
// Remove unnecessary global variables
let respuestaSeleccionada = null;
let preguntaActual = 0;
const numPreguntasPermitidas = 5;

// Simplify the button creation function
function generarBotonRespuesta(respuestaTexto, respuestaId, preguntaId) {
    const button = document.createElement('button');
    button.id = respuestaId;
    button.classList.add('btn', 'btn-primary', 'respuesta-btn');
    button.type = 'button';
    button.style.width = '350px';
    button.style.height = '280px';
    button.style.background = 'rgb(238,242,248)';
    button.style.color = 'rgb(33,37,41)';
    button.style.borderWidth = '3px';
    button.style.borderColor = 'rgb(11,110,253)';
    button.textContent = respuestaTexto;
    button.onclick = function() {
        seleccionarRespuesta(respuestaId);
        respuestaSeleccionada = respuestaId;
    };
    return button;
}

// Simplify the response checking function
function revisarRespuesta(preguntaId, respuestaSeleccionada) {
    const respuestaCorrecta = 'respuesta1c';
    const allButtons = document.querySelectorAll('.btn-primary');
    const progressbar = document.querySelector('.progress-bar');
    if (respuestaSeleccionada === respuestaCorrecta) {
        alert('¡Respuesta correcta!');
        const progreso = ((preguntaActual + 1) / 80) * 100;
        progressbar.style.width = `${progreso}%`;
        preguntaActual++;
        if (preguntaActual < numPreguntasPermitidas) {
            mostrarSiguientePregunta();
        } else {
            $('#modalConfirmacion').modal('show');
        }
    } else {
        alert('Vuelve a intentarlo');
        allButtons.forEach(button => {
            if (!button.classList.contains('btn-revisar')) {
                button.style.backgroundColor = 'rgb(238,242,248)';
            }
        });
    }
    allButtons.forEach(button => {
        button.disabled = false;
    });
}

// Simplify the shuffle array function
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

// Simplify the answer selection function
function seleccionarRespuesta(respuestaId) {
    const selectedButton = document.getElementById(respuestaId);
    selectedButton.style.backgroundColor = 'yellow';
    const allButtons = document.querySelectorAll('.btn-primary');
    allButtons.forEach(button => {
        if (button.id !== respuestaId && !button.classList.contains('btn-revisar')) {
            button.disabled = true;
        }
    });
}

// Simplify the question display function
function mostrarPreguntas(preguntas) {
    window.preguntas = preguntas;
    mostrarSiguientePregunta();
}

// Simplify the next question display function
function mostrarSiguientePregunta() {
    const preguntas = window.preguntas;
    if (preguntaActual >= preguntas.length) {
        alert('¡Has completado todas las preguntas!');
        return;
    }
    const contenedorPreguntas = document.getElementById('preguntas-container');
    contenedorPreguntas.innerHTML = '';
    const contenedorRespuestas = document.getElementById('respuestas-container');
    contenedorRespuestas.innerHTML = '';

    const pregunta = preguntas[preguntaActual];
    const indices = [0, 1, 2, 3];
    const indicesMezclados = shuffleArray(indices);
    const respuestasMezcladas = indicesMezclados.map(i => {
        switch (i) {
            case 0: return { texto: pregunta.respuesta1c, id: 'respuesta1c' };
            case 1: return { texto: pregunta.respuesta2, id: 'respuesta2' };
            case 2: return { texto: pregunta.respuesta3, id: 'respuesta3' };
            case 3: return { texto: pregunta.respuesta4, id: 'respuesta4' };
        }
    });

    const preguntaContainer = document.createElement('div');
    preguntaContainer.classList.add('container');
    preguntaContainer.style.width = '722px';
    const preguntaTitle = document.createElement('h1');
    preguntaTitle.classList.add('text-start');
    preguntaTitle.style.color = 'var(--swiper-theme-color)';
    preguntaTitle.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-stars">
            <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path>
        </svg>&nbsp;Pregunta&nbsp;${pregunta.id}`;

    const preguntaDataContainer = document.createElement('div');
    const preguntaData = document.createElement('p');
    preguntaData.style.fontSize = '30px';
    preguntaData.style.fontWeight = 'bold';
    preguntaData.textContent = pregunta.pregunta;

    const respuestaContainer = document.createElement('div');
    respuestaContainer.classList.add('container');
    respuestaContainer.style.width = '722px';
    respuestaContainer.style.padding = '15px';

    const row = document.createElement('div');
    row.classList.add('row');

    respuestasMezcladas.forEach(respuesta => {
        const button = generarBotonRespuesta(respuesta.texto, respuesta.id, pregunta.id);
        const col = document.createElement('div');
        col.classList.add('col-md-6');
        col.appendChild(button);
        row.appendChild(col);
    });

    const revisarButton = document.createElement('button');
    revisarButton.classList.add('btn', 'btn-primary', 'btn-revisar');
    revisarButton.textContent = 'Revisar';
    revisarButton.onclick = function() {
        const preguntaId = pregunta.id;
        revisarRespuesta(preguntaId, respuestaSeleccionada);
    };

    respuestaContainer.appendChild(row);
    respuestaContainer.appendChild(revisarButton);

    preguntaDataContainer.appendChild(preguntaData);
    preguntaContainer.appendChild(preguntaDataContainer);
    preguntaContainer.appendChild(respuestaContainer);
    contenedorPreguntas.appendChild(preguntaContainer);
}

window.onload = function() {
    generarjsonDatosLiderazgo();
};