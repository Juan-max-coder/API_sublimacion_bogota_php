<?php
// Controlador REST para la entidad Empleado
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Empleado.php';
include '../dao/EmpleadoDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new EmpleadoDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Listar empleados
        echo json_encode($dao->listar());
        break;

    case 'POST':
        // Registrar nuevo empleado
        $data = json_decode(file_get_contents("php://input"), true);
        $empleado = new Empleado(null, $data['nombreEmpleado'], $data['cargoEmpleado'], $data['areaEmpleado'], $data['contactoEmpleado'], $data['Usuario_idUsuario']);
        echo json_encode($dao->insertar($empleado));
        break;

    case 'PUT':
        // Actualizar empleado existente
        $data = json_decode(file_get_contents("php://input"), true);
        $empleado = new Empleado($data['idEmpleado'], $data['nombreEmpleado'], $data['cargoEmpleado'], $data['areaEmpleado'], $data['contactoEmpleado'], $data['Usuario_idUsuario']);
        echo json_encode($dao->actualizar($empleado));
        break;

    case 'DELETE':
        // Eliminar empleado por ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idEmpleado']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}
?>