<?php
// Controlador REST para la entidad InventarioMovimiento
header('Content-Type: application/json');
include '../conexion.php';
include '../model/InventarioMovimiento.php';
include '../dao/InventarioMovimientoDAO.php';

$dao = new InventarioMovimientoDAO($conn);

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
        $movimiento = new InventarioMovimiento(null, $data['tipoMovimiento'], $data['cantidadDelMovimiento'], $data['detallesDelMaterialEnMovimiento'], $data['Material_idMaterial']);
        echo json_encode($dao->insertar($movimiento));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idMovimiento'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idMovimiento"]);
            exit;
        }
        $movimiento = new InventarioMovimiento($data['idMovimiento'], $data['tipoMovimiento'], $data['cantidadDelMovimiento'], $data['detallesDelMaterialEnMovimiento'], $data['Material_idMaterial']);
        echo json_encode($dao->actualizar($movimiento));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idMovimiento'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idMovimiento"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idMovimiento']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}