$(document).ready(
    tablaPersonas()
);

function tablaPersonas() {
    $('#tablaPersonas').DataTable();
}

function guardarSolicitud() {
    const nombre = document.getElementById("nombre").textContent;
    const primerApellido = document.getElementById("primerApellido").textContent;
    const segundoApellido = document.getElementById("segundoApellido").textContent;
    const fechaSolicitud = document.getElementById("fechaSolicitud").textContent;
    const cardinalidad = document.getElementById("cardinalidad").textContent;
    const fechaInicio = document.getElementById("fechaInicio").textContent;
    const fechaFin = document.getElementById("fechaFin").textContent;
    const horaInicio = document.getElementById("horaInicio").textContent;
    const horaFin = document.getElementById("horaFin").textContent;
    const numeroDias = document.getElementById("numeroDias").textContent;
    const explique = document.getElementById("explique").textContent;

    const infoEnviar = {
        nombre: nombre,
        primerApellido: primerApellido,
        segundoApellido: segundoApellido,
        fechaSolicitud: fechaSolicitud,
        cardinalidad: cardinalidad,
        fechaInicio: fechaInicio,
        fechaFin: fechaFin,
        horaInicio: horaInicio,
        horaFin: horaFin,
        numeroDias: numeroDias,
        explique: explique
    }

    fetch(
        {
            url: 'localhost/v1/solicitud',
            method: 'POST',
            body: JSON.stringify(infoEnviar)
        }
    ).then(data => data.json()).then(response => console.log(response));
}