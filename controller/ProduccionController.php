<?php
// Controlador REST para la entidad Produccion
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Produccion.php';
include '../dao/ProduccionDAO.php';

$dao = new ProduccionDAO($conn);

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
        $produccion = new Produccion(null, $data['fechaInicioProduccion'], $data['fechaFinProduccion'], $data['estadoProduccion'], $data['Pedido_idPedido']);
        echo json_encode($dao->insertar($produccion));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idProduccion'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idProduccion"]);
            exit;
        }
        $produccion = new Produccion($data['idProduccion'], $data['fechaInicioProduccion'], $data['fechaFinProduccion'], $data['estadoProduccion'], $data['Pedido_idPedido']);
        echo json_encode($dao->actualizar($produccion));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idProduccion'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idProduccion"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idProduccion']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>