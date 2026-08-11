<?php
// Controlador REST para la entidad Pedido
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Pedido.php';
include '../dao/PedidoDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new PedidoDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Listar pedidos
        echo json_encode($dao->listar());
        break;

    case 'POST':
        // Registrar nuevo pedido
        $data = json_decode(file_get_contents("php://input"), true);
        $pedido = new Pedido(null, $data['fechaRegistroPedido'], $data['estadoPedido'], $data['prioridadPedido'], $data['fechaEntregaEstimadaPedido'], $data['Material_idMaterial'], $data['Cliente_idCliente'], $data['Empleado_idEmpleado']);
        echo json_encode($dao->insertar($pedido));
        break;

    case 'PUT':
        // Actualizar pedido existente
        $data = json_decode(file_get_contents("php://input"), true);
        $pedido = new Pedido($data['idPedido'], $data['fechaRegistroPedido'], $data['estadoPedido'], $data['prioridadPedido'], $data['fechaEntregaEstimadaPedido'], $data['Material_idMaterial'], $data['Cliente_idCliente'], $data['Empleado_idEmpleado']);
        echo json_encode($dao->actualizar($pedido));
        break;

    case 'DELETE':
        // Eliminar pedido por ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idPedido']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}
?>