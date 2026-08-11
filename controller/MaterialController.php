<?php
// Controlador REST para la entidad Material
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Material.php';
include '../dao/MaterialDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new MaterialDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Listar materiales
        echo json_encode($dao->listar());
        break;

    case 'POST':
        // Registrar nuevo material
        $data = json_decode(file_get_contents("php://input"), true);
        $material = new Material(null, $data['nombreMaterial'], $data['tipoMaterial'], $data['colorMaterial'], $data['cantidadDisponibleMaterial']);
        echo json_encode($dao->insertar($material));
        break;

    case 'PUT':
        // Actualizar material existente
        $data = json_decode(file_get_contents("php://input"), true);
        $material = new Material($data['idMaterial'], $data['nombreMaterial'], $data['tipoMaterial'], $data['colorMaterial'], $data['cantidadDisponibleMaterial']);
        echo json_encode($dao->actualizar($material));
        break;

    case 'DELETE':
        // Eliminar material por ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idMaterial']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}
?>