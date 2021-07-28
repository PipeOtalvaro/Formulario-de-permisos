<?php

namespace Models;

class Conexion
{
    private $datos = array(
        "host" => "localhost",
        "user" => "root",
        "pass" => "root",
        "db" => "solicitudes"
    );

    private $conexion;

    public function getConnstring()
    {
        $con = mysqli_connect(
            $this->datos['host'],
            $this->datos['user'],
            $this->datos['pass'],
            $this->datos['solicitudes']
        );

        if (mysqli_connect_errno()) {
            print("Conexión fallida: %s\n" . mysqli_connect_errno());
            exit();
        } else {
            $this->conexion = $con;
        }
        return $this->conexion;
    }

    // public function consultaSimple($sql)
    // {
    //     $this->con->query($sql);
    // }

    // public function consultaRetorno($sql)
    // {
    //     $datos = $this->con->query($sql);
    //     return $datos;
    // }
}
