<?php

include '../Conexion.php';

namespace Models;

class Jefe extends Persona
{
    private $jefeSeleccionado;

    public function listar()
    {
        $sql = "SELECT CONCAT(j.nombre, ' ', j.primer_apellido, ' ', COALESCE(j.segundo_apellido,'' ) nombre_completo FROM jefes j";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }

    public function setJefeSelecionado($opcion)
    {
        $this->jefeSeleccionado = $opcion;
    }

    public function getJefeSeleccionado()
    {
        return $this->jefeSeleccionado;
    }
}