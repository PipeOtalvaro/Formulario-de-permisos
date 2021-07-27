$(document).ready(
    tablaPersonas()
);

let nombre = document.getElementById("celular");
let error = document.getElementById("error");
error.style.color ='red';

function tablaPersonas() {
    $('#tablaPersonas').DataTable();
}

function validarCampoVacio() {
    let mensajeError=[];

    if(celular.value === null || celular.value ==='' ){
        mensajeError.push('Ingresa tu número de celular');
    }
    error.innerHTML = mensajeError.join(', ');
    return false;
}