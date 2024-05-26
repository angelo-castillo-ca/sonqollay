function data_liderazgo() {
    fetch('data_liderazgo.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error en la solicitud');
        }
        return response.json(); // Parsear la respuesta como JSON
    })
    .then(data => {
        console.log('Datos recibidos correctamente:', data);
        // Aquí puedes manipular los datos según tus necesidades
    })
    .catch(error => {
        console.error('Error al ejecutar data_liderazgo.php:', error);
    });
}

var preguntasJSON;
var indicePreguntaActual = 0;
var respuestaSeleccionada = "";

function cargarDatos(nombrejson){
    fetch(nombrejson)
    .then(response => response.json())
    .then(data => {
      preguntasJSON = data;
      generarPreguntas();
    })
    .catch(error => console.error('Error al cargar el archivo JSON:', error));
}
    
// Cargar el JSON desde el archivo datos_liderazgo.json

function generarPreguntas() {
    var preguntaActual = preguntasJSON[indicePreguntaActual];

    // Mezcla las respuestas aleatoriamente
    var respuestasMezcladas = [
        preguntaActual.respuesta1c,
        preguntaActual.respuesta2,
        preguntaActual.respuesta3,
        preguntaActual.respuesta4
    ].sort(() => Math.random() - 0.5);

    var contenido = `
        <div class="steps-progressbar text-center container">
            <div class="progress">
                <div class="progress-bar progress-bar-animated" role="progressbar" style="width: ${((indicePreguntaActual + 1) / preguntasJSON.length) * 100}%" aria-valuenow="${indicePreguntaActual + 1}" aria-valuemin="0" aria-valuemax="${preguntasJSON.length}"></div>
            </div>
        </div>
        <div class="container" style="width: 722px;">
            <div>
                <h1 class="text-start" style="color: var(--swiper-theme-color);"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-stars">
                        <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"></path>
                    </svg>&nbsp;Pregunta&nbsp;${preguntaActual.id}</h1>
            </div>
            <div>
                <p style="font-size: 30px;font-weight: bold;">${preguntaActual.pregunta}</p>
            </div>
        </div>
        <div class="container" style="width: 722px;padding: 15px;">
            <div class="row">
                <div class="col-md-6"><button class="btn btn-primary" type="button" style="width: 350px;height: 280px;background: rgb(238,242,248);color: rgb(33,37,41);border-width: 3px;border-color: rgb(11,110,253);" onclick="seleccionarRespuesta('${respuestasMezcladas[0]}')">${respuestasMezcladas[0]}</button></div>
                <div class="col-md-6"><button class="btn btn-primary" type="button" style="width: 350px;height: 280px;background: rgb(238,242,248);color: rgb(33,37,41);border-width: 3px;border-color: rgb(11,110,253);" onclick="seleccionarRespuesta('${respuestasMezcladas[1]}')">${respuestasMezcladas[1]}</button></div>
            </div>
        </div>
        <div class="container" style="width: 722px;padding: 15px;">
            <div class="row">
                <div class="col-md-6"><button class="btn btn-primary" type="button" style="width: 350px;height: 280px;background: rgb(238,242,248);color: rgb(33,37,41);border-width: 3px;border-color: rgb(11,110,253);" onclick="seleccionarRespuesta('${respuestasMezcladas[2]}')">${respuestasMezcladas[2]}</button></div>
                <div class="col-md-6"><button class="btn btn-primary" type="button" style="width: 350px;height: 280px;background: rgb(238,242,248);color: rgb(33,37,41);border-width: 3px;border-color: rgb(11,110,253);" onclick="seleccionarRespuesta('${respuestasMezcladas[3]}')">${respuestasMezcladas[3]}</button></div>
            </div>
        </div>
        <div class="container-fluid" style="width: 224px;">
            <div class="row">
                <div class="col-md-12">
                    <a href="#">
                        <button id="revisarBtn" class="btn btn-primary" type="button" style="width: 188.2734px;height: 61px;" onclick="verificarRespuesta()">REVISAR</button>
                    </a>
                </div>
            </div>
        </div>
    `;

    document.getElementById('container').innerHTML = contenido;
}

function seleccionarRespuesta(respuesta) {
    // Desactiva la clase seleccionada de todos los botones
    var botones = document.querySelectorAll('.btn-primary');
    botones.forEach(boton => boton.classList.remove('selected-answer'));

    // Asigna la clase seleccionada al botón actual
    respuestaSeleccionada = respuesta;
    var botonSeleccionado = Array.from(botones).find(boton => boton.textContent === respuestaSeleccionada);
    botonSeleccionado.classList.add('selected-answer');
}


function verificarRespuesta() {
    var preguntaActual = preguntasJSON[indicePreguntaActual];
    var botones = document.querySelectorAll('.btn-primary');

    if (respuestaSeleccionada === preguntaActual.respuesta1c) {
        alert("¡Respuesta correcta!");
        indicePreguntaActual++;

        if (indicePreguntaActual < preguntasJSON.length) {
            respuestaSeleccionada = "";  // Reiniciar la respuesta seleccionada
            generarPreguntas();
            actualizarBarraDeProgreso();
        } else {
            alert("¡Todas las preguntas han sido respondidas!");
        }
    } else {
        alert("Respuesta incorrecta. Inténtalo de nuevo.");
        // Puedes agregar más lógica aquí, como reiniciar el juego o mostrar la respuesta correcta, según tus necesidades.
    }

    // Desactiva la clase seleccionada de todos los botones después de verificar la respuesta
    botones.forEach(boton => boton.classList.remove('selected-answer'));
}


function actualizarBarraDeProgreso() {
    var barraDeProgreso = document.querySelector('.progress-bar');
    barraDeProgreso.style.width = `${((indicePreguntaActual + 1) / preguntasJSON.length) * 100}%`;
    barraDeProgreso.setAttribute('aria-valuenow', indicePreguntaActual + 1);
}

