<?php

namespace Models;

use Models\Conexion as Conexion;


class Dias
{

    public $id;
    public $nombre;

    public $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
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
        return $this->con->consultaRetorno($sql);
    }
}
