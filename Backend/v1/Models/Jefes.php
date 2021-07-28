<?php


namespace Models;

use Models\Conexion as Conexion;

class Jefe extends Persona
{

    private $con;

    public function __construc()
    {
        $this->con = new Conexion();
        $conexion = $this->con->getConnstring();

        $request_method = $_SERVER["REQUEST_METHOD"];

        switch ($request_method) {
            case 'GET':
                if (!empty($_GET['id'])) {
                    $id = intval($_GET['id']);
                    $this->getJefeById($id);
                } else {
                    $this->listarJefes();
                }
                break;

            default:
                header('HTTP/1.0 405 Method not allowed');
                break;
        }
    }


    public function listarJefes()
    {
        global $conexion;
        $sql = "SELECT j.id, CONCAT(j.nombre, ' ', j.primer_apellido, ' ', COALESCE(j.segundo_apellido,'' ) nombre_completo FROM jefes j";
        $response = array();
        $result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $response[] = $row;
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }

    public function getJefeById($id)
    {
    }
}
