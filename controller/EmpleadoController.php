<?php
// Controlador REST para la entidad Empleado
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Empleado.php';
include '../dao/EmpleadoDAO.php';

$dao = new EmpleadoDAO($conn);

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
        $empleado = new Empleado(null, $data['nombreEmpleado'], $data['cargoEmpleado'], $data['areaEmpleado'], $data['contactoEmpleado'], $data['Usuario_idUsuario']);
        echo json_encode($dao->insertar($empleado));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idEmpleado'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idEmpleado"]);
            exit;
        }
        $empleado = new Empleado($data['idEmpleado'], $data['nombreEmpleado'], $data['cargoEmpleado'], $data['areaEmpleado'], $data['contactoEmpleado'], $data['Usuario_idUsuario']);
        echo json_encode($dao->actualizar($empleado));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idEmpleado'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idEmpleado"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idEmpleado']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>