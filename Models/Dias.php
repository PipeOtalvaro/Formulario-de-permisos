<?php

require_once "../Conexion.php";

namespace Models;

use Models\Conexion;

class Dias
{

    public $id;
    public $nombre;

    public $con;
    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function obtenerDias()
    {
        $sql = "SELECT * FROM dias";
        $query = $this->con->consultaRetorno($sql);
        $data =  array();
        if ($query) {
            while ($dia = $query->fetch_object()) {
                $data[] = $dia;
            }
        }
        return $data;
    }
}
