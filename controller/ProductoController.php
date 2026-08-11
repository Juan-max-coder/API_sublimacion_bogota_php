<?php
// Controlador REST para la entidad Produccion
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Produccion.php';
include '../dao/ProduccionDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new ProduccionDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Listar producciones
        echo json_encode($dao->listar());
        break;

    case 'POST':
        // Registrar nueva producción
        $data = json_decode(file_get_contents("php://input"), true);
        $produccion = new Produccion(null, $data['fechaInicioProduccion'], $data['fechaFinProduccion'], $data['estadoProduccion']);
        echo json_encode($dao->insertar($produccion));
        break;

    case 'PUT':
        // Actualizar producción existente
        $data = json_decode(file_get_contents("php://input"), true);
        $produccion = new Produccion($data['idProduccion'], $data['fechaInicioProduccion'], $data['fechaFinProduccion'], $data['estadoProduccion']);
        echo json_encode($dao->actualizar($produccion));
        break;

    case 'DELETE':
        // Eliminar producción por ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idProduccion']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}
?>