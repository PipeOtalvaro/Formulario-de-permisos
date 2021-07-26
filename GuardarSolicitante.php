<?php

include(__DIR__ . '/Conexion.php');

if (isset($_POST['guardar'])) {


    $nombre = $_POST['nombre'];
    $primerApellido = $_POST['primerApellido'];
    $segundoApellido = $_POST['segundoApellido'];
    $fechaSolicitud = $_POST['fechaSolicitud'];

    $sql = "INSERT INTO solicitantes(nombre,primer_apellido,segundo_apellido,fechaSolicitud) VALUES('$nombre','$primerApellido','$segundoApellido','$fechaSolicitud')";
    $con->consultaSimple($sql);
}
