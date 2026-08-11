<?php
// Controlador REST para la entidad Reporte
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Reporte.php';
include '../dao/ReporteDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new ReporteDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Listar reportes
        echo json_encode($dao->listar());
        break;

    case 'POST':
        // Registrar nuevo reporte
        $data = json_decode(file_get_contents("php://input"), true);
        $reporte = new Reporte(null, $data['tipoReporte'], $data['fechaReporte'], $data['Usuario_idUsuario']);
        echo json_encode($dao->insertar($reporte));
        break;

    case 'PUT':
        // Actualizar reporte existente
        $data = json_decode(file_get_contents("php://input"), true);
        $reporte = new Reporte($data['idReporte'], $data['tipoReporte'], $data['fechaReporte'], $data['Usuario_idUsuario']);
        echo json_encode($dao->actualizar($reporte));
        break;

    case 'DELETE':
        // Eliminar reporte por ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idReporte']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}
?>