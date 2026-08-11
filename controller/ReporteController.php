<?php
// Controlador REST para la entidad Reporte
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Reporte.php';
include '../dao/ReporteDAO.php';

$dao = new ReporteDAO($conn);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo json_encode($dao->listar());
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!$data) {
            echo json_encode(["status" => "error", "message" => "Datos no válidos o cuerpo vacío"]);
            exit;
        }
        $reporte = new Reporte(null, $data['tipoReporte'], $data['fechaReporte'], $data['Usuario_idUsuario']);
        echo json_encode($dao->insertar($reporte));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idReporte'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idReporte"]);
            exit;
        }
        $reporte = new Reporte($data['idReporte'], $data['tipoReporte'], $data['fechaReporte'], $data['Usuario_idUsuario']);
        echo json_encode($dao->actualizar($reporte));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idReporte'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idReporte"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idReporte']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>