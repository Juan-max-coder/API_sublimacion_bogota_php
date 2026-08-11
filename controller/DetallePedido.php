<?php
// Controlador REST para la entidad DetallePedido
header('Content-Type: application/json');
include '../conexion.php';
include '../model/DetallePedido.php';
include '../dao/DetallePedidoDAO.php';

$dao = new DetallePedidoDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo json_encode($dao->listar());
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $detalle = new DetallePedido(null, $data['cantidadMaterial'], $data['precioUnitarioMaterial'], $data['costoManoDeObra'], $data['subtotalPedido'], $data['Pedido_idPedido'], $data['Material_idMaterial'], $data['Insumos_idInsumo']);
        echo json_encode($dao->insertar($detalle));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $detalle = new DetallePedido($data['idDetalle'], $data['cantidadMaterial'], $data['precioUnitarioMaterial'], $data['costoManoDeObra'], $data['subtotalPedido'], $data['Pedido_idPedido'], $data['Material_idMaterial'], $data['Insumos_idInsumo']);
        echo json_encode($dao->actualizar($detalle));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idDetalle']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}
?>