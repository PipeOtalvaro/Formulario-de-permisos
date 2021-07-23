<?php

namespace Models;

class Solicitante extends Persona
{
    public function add()
    {
        $sql = "INSERT INTO solicitantes (id, nombre, primer_apellido, segundo_apellido, telefono, email, create_at)
        VALUES(null, '{$this->nombre}','{$this->primerApellido}','{$this->segundoApellido}','{$this->telefono}','{$this->email}', NOW()";
        $this->con->consultaSimple($sql);
    }
}
