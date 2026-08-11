<?php
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Cliente.php';
include '../dao/ClienteDAO.php';

$dao = new ClienteDAO($conn);

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
        $cliente = new Cliente(null, $data['nombreCliente'], $data['apellidoCliente'], $data['direccionCliente'], $data['telefonoCliente'], $data['correoCliente'], $data['tipoCliente']);
        echo json_encode($dao->registrar($cliente));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idCliente'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idCliente"]);
            exit;
        }
        $cliente = new Cliente($data['idCliente'], $data['nombreCliente'], $data['apellidoCliente'], $data['direccionCliente'], $data['telefonoCliente'], $data['correoCliente'], $data['tipoCliente']);
        echo json_encode($dao->actualizar($cliente));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idCliente'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idCliente"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idCliente']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>