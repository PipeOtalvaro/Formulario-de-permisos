<?php

namespace Controller;

use Models\Solicitante as Solicitante;
use Models\Solicitud as Solicitud;
use Conexion;

class SolicitudController
{

    private $solicitante;
    private $solicitud;
    private $con;

    public function __construct()
    {
        $this->solicitante = new Solicitante();
        $this->solicitud = new Solicitud();
        $this->con = new Conexion();
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
            $tipo_ausentismo = $_POST['tipo_ausentismo'];
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFin = $_POST['fechaFin'];
            $horaInicio = $_POST['horaInicio'];
            $horaFin = $_POST['horaFin'];
            $numeroDias = $_POST['numeroDias'];
            $frecuencia = $_POST['frecuencia'];
            $explicacion = $_POST['explicacion'];
            $jefeDirectoPersona = $_POST['jefeDirectoPersona'];
            $estado = false;


            $this->guardarSolicitante();
            $sql = "INSERT INTO solicitudes(id, fecha_solicitud, tipo_ausentismo, fecha_inicio, fecha_fin, hora_inicio, hora_fin, numero_dias, frecuencia, explicacion, estado, solicitantes_id, jefes_id, personas_id ) 
            values (null, $fechaSolicitud, $tipo_ausentismo, $fechaInicio, $fechaFin, $horaInicio, $horaFin,$numeroDias ,$frecuencia, $explicacion, $estado, $,$jefeDirectoPersona, $persona_id ";
            $this->con->consultaSimple($sql);
        }
    }

    public function guardarSolicitante()
    {
        if (isset($_POST['enviar'])) {

            $nombre = $_POST['nombreSolicitante'];
            $primerApellido = $_POST['primerApellido'];
            $segundoApellido = $_POST['segundoApellido'];
            $celular = $_POST['celular'];
            $fechaSolicitud = $_POST['fechaSolicitud'];
            $jefeDirectoSolicitante = $_POST['jefeDirectoSolicitante'];

            $sql = "INSERT INTO solicitantes (id, nombre, primer_apellido, segundo_apellido, celular, create_at, jefes_id) 
            VALUES(NULL, $nombre, $primerApellido, $segundoApellido, $celular, $fechaSolicitud, $jefeDirectoSolicitante)";

            $this->con->consultaSimple($sql);
        }
    }
}
