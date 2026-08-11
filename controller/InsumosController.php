<?php
// Controlador REST para la entidad Insumos
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Insumos.php';
include '../dao/InsumosDAO.php';

$dao = new InsumosDAO($conn);

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
        $insumo = new Insumos(null, $data['nombreInsumo'], $data['costoInsumo'], $data['stockInsumo'], $data['precioInsumo'], $data['InventarioMovimiento_idMovimiento']);
        echo json_encode($dao->insertar($insumo));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idInsumo'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idInsumo"]);
            exit;
        }
        $insumo = new Insumos($data['idInsumo'], $data['nombreInsumo'], $data['costoInsumo'], $data['stockInsumo'], $data['precioInsumo'], $data['InventarioMovimiento_idMovimiento']);
        echo json_encode($dao->actualizar($insumo));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idInsumo'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idInsumo"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idInsumo']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>