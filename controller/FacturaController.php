<?php
// Controlador REST para la entidad Factura
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Factura.php';
include '../dao/FacturaDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new FacturaDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Listar facturas
        echo json_encode($dao->listar());
        break;

    case 'POST':
        // Registrar nueva factura
        $data = json_decode(file_get_contents("php://input"), true);
        $factura = new Factura(null, $data['estadoFactura'], $data['fechaExportacionFactura'], $data['fechaConfirmacionFactura'], $data['Pedido_idPedido']);
        echo json_encode($dao->insertar($factura));
        break;

    case 'PUT':
        // Actualizar factura existente
        $data = json_decode(file_get_contents("php://input"), true);
        $factura = new Factura($data['idFactura'], $data['estadoFactura'], $data['fechaExportacionFactura'], $data['fechaConfirmacionFactura'], $data['Pedido_idPedido']);
        echo json_encode($dao->actualizar($factura));
        break;

    case 'DELETE':
        // Eliminar factura por ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idFactura']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}
?>