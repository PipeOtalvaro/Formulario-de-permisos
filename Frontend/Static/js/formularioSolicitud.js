$(document).ready(
    tablaPersonas(),
    capturarFechaActual(),
    llenarSelect()
    
);

function opcionesSelectJefes() {
    
}
function tablaPersonas() {
    $('#tablaPersonas').DataTable();
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'personas.json', true);
    xhttp.send();
    xhttp.onreadystatechange = function () {

            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#res');
            res.innerHTML=""
            for (let persona of datos) {
                res.innerHTML += `<tr>
                    <td><input type="checkbox" id="${persona.id}"></td>
                    <td>${persona.identificacion}</td>
                    <td>${persona.nombre}</td>
                    <td>${persona.apellidos}</td>
                    <td>${persona.email}</td>
                    <td><button class="btn btn-danger" style="width:100%" onClick="eliminar()">Eliminar</button></td>
                    </tr>`;
            }

    }
}

function eliminar() {
    console.log("Hola");
}

function llenarSelect() {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'jefes.json', true);
    xhttp.send();
    xhttp.onreadystatechange = function () {

        let datos = JSON.parse(this.responseText);
        let jefeSolicitante = document.querySelector('#jefeDirectoSolicitante');
        let jefePersona = document.querySelector('#jefeDirectoPersona');
        jefeSolicitante.innerHTML = "";
        jefePersona.innerHTML = "";
        for (let jefe of datos) {

            jefeSolicitante.innerHTML += `
                <option value="${jefe.id}">${jefe.nombre}  ${jefe.primerApellido}  ${jefe.segundoApellido} </option>
            `;
            jefePersona.innerHTML += `
                <option value="${jefe.id}">${jefe.nombre}  ${jefe.primerApellido}  ${jefe.segundoApellido} </option>
            `;
        }

    }
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

function numeroDias() {

    let fechaInicio = document.getElementById("fechaInicio").value;
    let fechaFin = document.getElementById("fechaFin").value;
    let contador=0;

    let dias = diasElegidos;
    var result = [];
    for (let i = 0; i < dias.length; i++) {
        
        let inicio = moment(fechaInicio),
            fin = moment(fechaFin), 
            dia = parseInt(dias[i],10);
        
        let current = inicio.clone();
    
        while (current.day(7 + dia).isBefore(fin)) {
            result.push(current.clone());
            contador++;            
        } 
        $('#numeroDias').val(contador);
    }
}

function guardarSolicitud() {

    campoObligatorio();
    compararFechas();
    numeroDias();

    // const nombre = document.getElementById("nombre").value;
    // const primerApellido = document.getElementById("primerApellido").value;
    // const segundoApellido = document.getElementById("segundoApellido").value;
    // const celular = document.getElementById("celular").value;
    // const fechaSolicitud = document.getElementById("fechaSolicitud").value;
    // const jefeDirectoSolicitante = document.getElementById("jefeDirectoSolicitante").value;
    // const cardinalidad = document.getElementById("cardinalidad").value;
    // const fechaInicio = document.getElementById("fechaInicio").value;
    // const fechaFin = document.getElementById("fechaFin").value;
    // const horaInicio = document.getElementById("horaInicio").value;
    // const horaFin = document.getElementById("horaFin").value;
    // const numeroDias = document.getElementById("numeroDias").value;
    // const frecuencia = document.getElementById("frecuencia").value;
    // const explicaion = document.getElementById("explicaion").value;
    // const persona = document.getElementById("persona").value;
    // const jefeDirectoPersona = document.getElementById("jefeDirectoPersona").value;

    // const infoEnviar = {
    //     nombre: nombre, 
    //     primerApellido: primerApellido, 
    //     segundoApellido: segundoApellido, 
    //     celular: celular, 
    //     fechaSolicitud: fechaSolicitud, 
    //     jefeDirectoSolicitante: jefeDirectoSolicitante, 
    //     cardinalidad: cardinalidad, 
    //     fechaInicio: fechaInicio, 
    //     fechaFin: fechaFin, 
    //     horaInicio: horaInicio, 
    //     horaFin: horaFin, 
    //     numeroDias: numeroDias, 
    //     frecuencia: frecuencia, 
    //     explicaion: explicaion, 
    //     persona: persona,
    //     jefeDirectoPersona: jefeDirectoPersona
    // }
    // console.log(infoEnviar);

    // fetch(
    //     {
    //         url: 'localhost/v1/solicitud',
    //         method: 'POST',
    //         body: JSON.stringify(infoEnviar)
    //     }
    // ).then(data => data.json()).then(response => console.log(response));
}