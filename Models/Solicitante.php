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

    public function addSolicitante($data)
    {
        $sql = "INSERT INTO solicitantes (id, nombre, primer_apellido, segundo_apellido, celular, create_at, jefe_id)
        VALUES(null, '{$this->nombre}','{$this->primerApellido}','{$this->segundoApellido}','{$this->telefono}','{$this->email}', NOW()";
        $this->con->consultaSimple($sql);
    }
}
