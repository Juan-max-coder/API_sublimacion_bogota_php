<?php
// Controlador REST para la entidad Factura
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Factura.php';
include '../dao/FacturaDAO.php';

$dao = new FacturaDAO($conn);

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
        $factura = new Factura(null, $data['estadoFactura'], $data['fechaExportacionFactura'], $data['fechaConfirmacionFactura'], $data['Pedido_idPedido']);
        echo json_encode($dao->insertar($factura));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idFactura'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idFactura"]);
            exit;
        }
        $factura = new Factura($data['idFactura'], $data['estadoFactura'], $data['fechaExportacionFactura'], $data['fechaConfirmacionFactura'], $data['Pedido_idPedido']);
        echo json_encode($dao->actualizar($factura));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idFactura'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idFactura"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idFactura']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>