<?php

namespace Models;

class Dias
{

    private $id;
    private $dia;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setDia($dia)
    {
        $this->dia = $dia;
    }
    public function getDia()
    {
        return $this->dia;
    }
}
