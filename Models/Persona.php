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
}
