$(document).ready(
    tablaPersonas(),
    capturarFechaActual()
    
);

function tablaPersonas() {
    $('#tablaPersonas').DataTable();
}

function campoObligatorio() {

    let variables = $('.requerido');
    let contador = variables.length;

    for (var j = 0; j < variables.length; j++) {
        if ($(variables[j]).val() == '' || $(variables[j]).val() == undefined) {
            contador = contador - 1;
        }
    }

    if (contador != variables.length) {
        document.getElementById("error").innerHTML="Existen campos obligatorios";

        return false;
    }    
}

function capturarFechaActual() {
    let fecha = new Date();
    if(fecha.getMonth>0){
        $('#fechaSolicitud').val(fecha.getFullYear() + "-" + (fecha.getMonth() + 1) + "-" + fecha.getDate())
    }else{
        $('#fechaSolicitud').val(fecha.getFullYear() + "-" + "0" + (fecha.getMonth() + 1) + "-" + fecha.getDate())
    }

}

function compararFechas() {
    
    let fechaInicio = document.getElementById("fechaInicio").value;
    let fechaFin = document.getElementById("fechaFin").value;

    var now = new Date();
    var fechaActual = moment(now).format('YYYY-MM-DD');


    if (fechaActual > fechaInicio) {

        document.getElementById("errorFechasInicioMenorActual").innerHTML = "La fecha de inicio debe ser mayor a la fecha actual";
        return false;
    }
    if (fechaFin < fechaInicio) {
        
        document.getElementById("errorFechas").innerHTML = "La fecha de finalización debe ser mayor a la fecha de inicio";
        return false;
    }
    if (fechaInicio == null || fechaInicio== "" && fechaInicio==null ||fechaFin =="") {
        
        document.getElementById("errorFechasNoSelecionadas").innerHTML = "Debe seleccionar una fecha inicio y una fecha fin primero";
    } 
    
    document.getElementById("errorFechas").innerHTML = "";
    document.getElementById("errorFechasInicioMenorActual").innerHTML = "";
    document.getElementById("errorFechasNoSelecionadas").innerHTML = "";
}

var diasElegidos = []

function elegirDias(element) {
    if (element.checked) {
        diasElegidos.push(element.value)
    } else {
        diasElegidos.splice(diasElegidos.indexOf(element.value), 1)
    }
}

function numeroDias(params) {

    let fechaInicio = document.getElementById("fechaInicio").value;
    let fechaFin = document.getElementById("fechaFin").value;
    let contador=0;

    let dias = diasElegidos;
    var result = [];
    for (let i = 0; i < dias.length; i++) {
        
        let start = moment(fechaInicio),
            end = moment(fechaFin), 
            day = parseInt(dias[i],10);
        
        let current = start.clone();
    
        while (current.day(7 + day).isBefore(end)) {
            result.push(current.clone());
            contador++;            
        } 
        $('#numeroDias').val(contador);
    }
    console.log(result.map(m => m.format('LLLL')));
}

function validarSeleccion() {
    console.log("hola");
}

function guardarSolicitud() {

    campoObligatorio();
    compararFechas();
    numeroDias();

    // const nombre = document.getElementById("nombre").textContent;
    // const primerApellido = document.getElementById("primerApellido").textContent;
    // const segundoApellido = document.getElementById("segundoApellido").textContent;
    // const fechaSolicitud = document.getElementById("fechaSolicitud").textContent;
    // const cardinalidad = document.getElementById("cardinalidad").textContent;
    // const fechaInicio = document.getElementById("fechaInicio").textContent;
    // const fechaFin = document.getElementById("fechaFin").textContent;
    // const horaInicio = document.getElementById("horaInicio").textContent;
    // const horaFin = document.getElementById("horaFin").textContent;
    // const numeroDias = document.getElementById("numeroDias").textContent;
    // const explique = document.getElementById("explique").textContent;
    // const persona = document.getElementById("persona").textContent;

    // const infoEnviar = {
    //     nombre: nombre,
    //     primerApellido: primerApellido,
    //     segundoApellido: segundoApellido,
    //     fechaSolicitud: fechaSolicitud,
    //     cardinalidad: cardinalidad,
    //     fechaInicio: fechaInicio,
    //     fechaFin: fechaFin,
    //     horaInicio: horaInicio,
    //     horaFin: horaFin,
    //     numeroDias: numeroDias,
    //     explique: explique
    // }

    // fetch(
    //     {
    //         url: 'localhost/v1/solicitud',
    //         method: 'POST',
    //         body: JSON.stringify(infoEnviar)
    //     }
    // ).then(data => data.json()).then(response => console.log(response));
}