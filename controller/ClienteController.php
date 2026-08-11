<?php
// Este archivo actúa como el controlador REST para la entidad Cliente
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Cliente.php';
include '../dao/ClienteDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new ClienteDAO($conn);

// Se verifica el tipo de petición HTTP (GET, POST, PUT, DELETE)
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Listar todos los clientes
        echo json_encode($dao->listar());
        break;

    case 'POST':
        // Registrar un nuevo cliente
        $data = json_decode(file_get_contents("php://input"), true);
        $cliente = new Cliente(null, $data['nombre'], $data['correo'], $data['telefono']);
        echo json_encode($dao->registrar($cliente));
        break;

    case 'PUT':
        // Actualizar un cliente existente
        $data = json_decode(file_get_contents("php://input"), true);
        $cliente = new Cliente($data['idCliente'], $data['nombre'], $data['correo'], $data['telefono']);
        echo json_encode($dao->actualizar($cliente));
        break;

    case 'DELETE':
        // Eliminar un cliente por su ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idCliente']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>