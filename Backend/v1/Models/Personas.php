<?php

include($_SERVER['DOCUMENT_ROOT'] . "Conexion.php");
$db = new Conexion();
$connection =  $db->getConnstring();

$request_method = $_SERVER["REQUEST_METHOD"];

switch ($request_method) {
    case 'GET':
        // Retrive Products
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            get_personas($id);
        } else {
            get_personas();
        }
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_personas()
{
    global $connection;
    $query = "SELECT p.identificacion, p.nombre, CONCAT(p.primer_apellido, ' ', COALESCE(p.segundo_apellido,'') ) apellidos, p.email, j.email
                FROM personas p INNER JOIN jefes j
                ON p.jefe_id = j.id
                union all 
                SELECT j.identificacion, j.nombre, CONCAT(p.primer_apellido, ' ', COALESCE(p.segundo_apellido,'') ) apellidos, j.email, j.email
                FROM jefes j";
    $response = array();
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($result)) {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}



// namespace Models;

// use Models\Jefe;
// use Models\Conexion as Conexion;

// class Persona
// {
//     private $id;
//     private $nombre;
//     private $primerApellido;
//     private $segundoApellido;
//     private $identificacion;
//     private $telefono;
//     private $email;
//     private $createAt;
//     private $jefeDirecto;


//     private $con;
//     public function __construct()
//     {
//         $this->con = new Conexion();
//         $this->jefeDirecto = new Jefe();
//     }
//     public function setId($id)
//     {
//         $this->id = $id;
//     }
//     public function getId()
//     {
//         return $this->id;
//     }

//     public function setNombre($nombre)
//     {
//         $this->nombre = $nombre;
//     }
//     public function getNombre()
//     {
//         return $this->nombre;
//     }

//     public function setPrimerApellido($primerApellido)
//     {
//         $this->primerapellido = $primerApellido;
//     }
//     public function getPrimerApellido()
//     {
//         return $this->primerApellido;
//     }

//     public function setSegundoApellido($segundoApellido)
//     {
//         $this->segundoApellido = $segundoApellido;
//     }
//     public function getSegundoApellido()
//     {
//         return $this->segundoApellido;
//     }
//     public function setIdentificacion($identificacion)
//     {
//         $this->identificacion = $identificacion;
//     }
//     public function getIdentificacion()
//     {
//         return $this->identificacion;
//     }

//     public function setTelefono($telefono)
//     {
//         $this->telefono = $telefono;
//     }
//     public function getTelefono()
//     {
//         return $this->telefono;
//     }
//     public function setCedula($cedula)
//     {
//         $this->cedula = $cedula;
//     }
//     public function getCedula()
//     {
//         return $this->cedula;
//     }

//     public function setEmail($email)
//     {
//         $this->email = $email;
//     }
//     public function getEmail()
//     {
//         return $this->email;
//     }

//     public function setCreateAt($createAt)
//     {
//         $this->createAt = $createAt;
//     }
//     public function getCreateAt()
//     {
//         return $this->createAt;
//     }

//     public function listar()
//     {
        // $sql = "SELECT p.identificacion, p.nombre, CONCAT(p.primer_apellido, ' ', COALESCE(p.segundo_apellido,'') ) apellidos, p.email, j.email
        //         FROM personas p INNER JOIN jefes j
        //         ON p.jefe_id = j.id
        //         union all 
        //         SELECT j.identificacion, j.nombre, CONCAT(p.primer_apellido, ' ', COALESCE(p.segundo_apellido,'') ) apellidos, j.email, j.email
        //         FROM jefes j";
//         $datos = $this->con->consultaRetorno($sql);
//         return $datos;
//     }


//     public function findById($id)
//     {
//         $sql = "SELECT * FROM personas WHERE id = :id";
//         $this->con->consultaRetorno($sql);
//     }
// }
