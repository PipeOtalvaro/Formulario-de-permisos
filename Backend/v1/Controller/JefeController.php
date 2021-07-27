<?php

namespace Controller;

use Models\Jefe;

class JefeController
{



    public function obtenerJefes()
    {
        $jefe = new Jefe();
        $jefes = array();
        $jefes["jefes"] = array();
        $res = $jefe->listar();
    }
}
