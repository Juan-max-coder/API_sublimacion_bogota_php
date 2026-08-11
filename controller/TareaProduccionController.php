<?php
// Controlador REST para la entidad TareaProduccion
header('Content-Type: application/json');
include '../conexion.php';
include '../model/TareaProduccion.php';
include '../dao/TareaProduccionDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new TareaProduccionDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Listar tareas
        echo json_encode($dao->listar());
        break;

    case 'POST':
        // Registrar nueva tarea
        $data = json_decode(file_get_contents("php://input"), true);
        $tarea = new TareaProduccion(null, $data['descripcionTarea'], $data['estadoTarea'], $data['avanceTarea'], $data['Empleado_idEmpleado'], $data['Produccion_idProduccion']);
        echo json_encode($dao->insertar($tarea));
        break;

    case 'PUT':
        // Actualizar tarea existente
        $data = json_decode(file_get_contents("php://input"), true);
        $tarea = new TareaProduccion($data['idTarea'], $data['descripcionTarea'], $data['estadoTarea'], $data['avanceTarea'], $data['Empleado_idEmpleado'], $data['Produccion_idProduccion']);
        echo json_encode($dao->actualizar($tarea));
        break;

    case 'DELETE':
        // Eliminar tarea por ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idTarea']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}
?>