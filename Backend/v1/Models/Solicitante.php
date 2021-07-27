<?php


namespace Models;

use Conexion;

class Solicitante extends Persona
{
    private $con;

    public function __construct()
    {
        $this->con = new Conexion();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM solicitantes WHERE id := ?";
        $this->con->consultaRetorno($sql);
    }
}
