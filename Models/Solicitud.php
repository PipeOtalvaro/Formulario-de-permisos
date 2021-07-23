<?php

namespace Models;

class Solicitud
{

    private $solicitante;
    private $fechaSolicitud;
    private $jefe;
    private $personaAusente;
    private $tipo;
    private $fechaInicio;
    private $fechaFin;
    private $horaInicio;
    private $horaFin;
    private $numeroDias;
    private $dias;
    private $frecuencia;
    private $explicacion;
    private $jefeDirecto;


    public function __construct()
    {
        $this->jefe = new Revisor();
        $this->personaAusente = new Persona();
        $this->jefeDirecto = new Jefe();
        $this->solicitante = new Solicitud();
    }

    public function setSolicitante($solicitante)
    {
        $this->solicitante = $solicitante;
    }
    public function getSolicitante()
    {
        return $this->solicitante;
    }

    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;
    }
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    public function setJefe($jefe)
    {
        $this->jefe = $jefe;
    }
    public function getJefe()
    {
        return $this->jefe;
    }

    public function setPersonaAusente($personaAusente)
    {
        $this->personaAusente = $personaAusente;
    }
    public function getPersonaAusente()
    {
        return $this->personaAusente;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function getTipo()
    {
        return $this->tipo;
    }

    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }
    public function getFechaFin()
    {
        return $this->fechaFin;
    }
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
    }
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    public function setNumeroDias($numeroDias)
    {
        $this->numeroDias = $numeroDias;
    }
    public function getNumeroDias()
    {
        return $this->numeroDias;
    }
    public function setDias($dias)
    {
        $this->dias = $dias;
    }
    public function getDias()
    {
        return $this->dias;
    }
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;
    }
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }
    public function setExplicacion($explicacion)
    {
        $this->explicacion = $explicacion;
    }
    public function getExplicacion()
    {
        return $this->explicacion;
    }
    public function setJefeDirecto($jefeDirecto)
    {
        $this->jefeDirecto = $jefeDirecto;
    }
    public function getJefeDirecto()
    {
        return $this->jefeDirecto;
    }
}
