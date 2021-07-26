<?php

use Models\Solicitante;

namespace Controller;

use Conexion;
use Models\Solicitante;
use Models\Solicitud;

class SolicitudController
{

    private $solicitante;
    private $solicitud;
    private $con;

    public function __construct()
    {
        $this->solicitante = new Solicitante();
        $this->solicitud = new Solicitud();
        $this->con = new Conexion();;
    }

    public function guardarSolicitud()
    {
        if (isset($_POST['guardar'])) {


            $nombre = $_POST['nombreSolicitante'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $celular = $_POST['celular'];
            $fechaSolicitud = $_POST['fechaSolicitud'];
            $jefeDirectoSolicitante = $_POST['jefeDirectoSolicitante'];
            $persona_id = $_POST['persona_id'];
            $cardinalidad = "";
            if ($_REQUEST['cardinalidad'] == "1") {
                $cardinalidad  = $_POST['cardinalidadEntrada'];
            } else if ($_REQUEST['cardinalidad'] == "0") {
                $cardinalidad = $_POST['cardinalidadSalida'];
            }
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFin = $_POST['fechaFin'];
            $horaInicio = $_POST['horaInicio'];
            $horaFin = $_POST['horaFin'];
            $numeroDias = $_POST['numeroDias'];
            $frecuencia = $_POST['frecuencia'];
            $explicacion = $_POST['explicacion'];
            $jefeDirectoPersona = $_POST['jefeDirectoPersona'];

            $dataSolicitante = array($nombre, $primerApellido, $segundoApellido, $celular, $fechaSolicitud, $jefeDirectoSolicitante);
            $this->solicitudes->add($dataSolicitante);

            $dataSolicitud = array(
                $nombre, $primerApellido, $segundoApellido, $celular, $fechaSolicitud, $jefeDirectoSolicitante, $persona_id,
                $cardinalidad, $fechaInicio, $fechaFin, $horaInicio, $horaFin, $numeroDias, $frecuencia, $explicacion, $jefeDirectoPersona
            );

            $this->solicitud->addSolicitud($dataSolicitud);
        }
    }
}
