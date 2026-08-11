<?php
// Controlador REST para la entidad Pedido
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Pedido.php';
include '../dao/PedidoDAO.php';

$dao = new PedidoDAO($conn);

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
        $pedido = new Pedido(null, $data['fechaRegistroPedido'], $data['estadoPedido'], $data['prioridadPedido'], $data['fechaEntregaEstimadaPedido'], $data['Material_idMaterial'], $data['Cliente_idCliente'], $data['Empleado_idEmpleado']);
        echo json_encode($dao->insertar($pedido));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idPedido'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idPedido"]);
            exit;
        }
        $pedido = new Pedido($data['idPedido'], $data['fechaRegistroPedido'], $data['estadoPedido'], $data['prioridadPedido'], $data['fechaEntregaEstimadaPedido'], $data['Material_idMaterial'], $data['Cliente_idCliente'], $data['Empleado_idEmpleado']);
        echo json_encode($dao->actualizar($pedido));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idPedido'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idPedido"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idPedido']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>