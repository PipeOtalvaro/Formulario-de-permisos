<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)), DS);
define('URL', "http://localhost/formulario_permisos/");

require_once "Config/Autoload.php";
Config\Autoload::run();
require_once "Views/Solicitantes/CrearSolicitud.php";
Config\Enrutador::run(new Config\Request());
