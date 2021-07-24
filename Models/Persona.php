<?php

namespace Models;

class Persona
{
    private $id;
    private $nombre;
    private $primerApellido;
    private $segundoApellido;
    private $telefono;
    private $email;
    private $createAt;


    private $con;
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

    public function setPrimerApellido($primerApellido)
    {
        $this->primerapellido = $primerApellido;
    }
    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;
    }
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
    public function getCedula()
    {
        return $this->cedula;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
    }
    public function getCreateAt()
    {
        return $this->createAt;
    }

    public function listar()
    {
        $sql = "SELECT CONCAT(j.nombre, ' ', j.primer_apellido, ' ', j.segundo_apellido ) nombre_completo FROM jefes j 
        UNION ALL
        SELECT CONCAT(p.nombre, ' ', p.primer_apellido, ' ', p.segundo_apellido) FROM personas";
        $datos = $this->con->consultaRetorno($sql);
        return $datos;
    }

    public function add()
    {
        $sql = "INSERT INTO personas (id, nombre, primer_apellido, segundo_apellido, telefono, email, create_at)
        VALUES(null, '{$this->nombre}','{$this->primerApellido}','{$this->segundoApellido}','{$this->telefono}','{$this->email}', NOW()";
        $this->con->consultaSimple($sql);
    }

    public function delete()
    {
        $sql = "DELETE FROM personas WHERE id = '{$this->id}'";
        $this->con->consultaSimple($sql);
    }
}
