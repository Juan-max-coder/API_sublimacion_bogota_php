<?php
// Controlador REST para la entidad InventarioMovimiento
header('Content-Type: application/json');
include '../conexion.php';
include '../model/InventarioMovimiento.php';
include '../dao/InventarioMovimientoDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new InventarioMovimientoDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Listar movimientos
        echo json_encode($dao->listar());
        break;

    case 'POST':
        // Registrar nuevo movimiento
        $data = json_decode(file_get_contents("php://input"), true);
        $movimiento = new InventarioMovimiento(null, $data['tipoMovimiento'], $data['cantidadDelMovimiento'], $data['detallesDelMaterialEnMovimiento'], $data['Material_idMaterial']);
        echo json_encode($dao->insertar($movimiento));
        break;

    case 'PUT':
        // Actualizar movimiento existente
        $data = json_decode(file_get_contents("php://input"), true);
        $movimiento = new InventarioMovimiento($data['idMovimiento'], $data['tipoMovimiento'], $data['cantidadDelMovimiento'], $data['detallesDelMaterialEnMovimiento'], $data['Material_idMaterial']);
        echo json_encode($dao->actualizar($movimiento));
        break;

    case 'DELETE':
        // Eliminar movimiento por ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idMovimiento']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}
?>