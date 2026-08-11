<?php
// Controlador REST para la entidad TareaProduccion
header('Content-Type: application/json');
include '../conexion.php';
include '../model/TareaProduccion.php';
include '../dao/TareaProduccionDAO.php';

$dao = new TareaProduccionDAO($conn);

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
        $tarea = new TareaProduccion(null, $data['descripcionTarea'], $data['estadoTarea'], $data['avanceTarea'], $data['Empleado_idEmpleado'], $data['Produccion_idProduccion']);
        echo json_encode($dao->insertar($tarea));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idTarea'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idTarea"]);
            exit;
        }
        $tarea = new TareaProduccion($data['idTarea'], $data['descripcionTarea'], $data['estadoTarea'], $data['avanceTarea'], $data['Empleado_idEmpleado'], $data['Produccion_idProduccion']);
        echo json_encode($dao->actualizar($tarea));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idTarea'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idTarea"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idTarea']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>