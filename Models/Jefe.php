<?php

require_once "../Conexion.php";

namespace Models;

use Conexion;

class Jefe extends Persona
{

    private $con;
    public function __construct()
    {
        $this->con = new Conexion();
    }
    public function listar()
    {
        $sql = "SELECT CONCAT(j.nombre, ' ', j.primer_apellido, ' ', j.segundo_apellido ) nombre_completo FROM jefes j";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }

    public function findByName(string $nombre)
    {
    }
}
