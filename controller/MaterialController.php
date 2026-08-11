<?php
// Controlador REST para la entidad Material
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Material.php';
include '../dao/MaterialDAO.php';

$dao = new MaterialDAO($conn);

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
        $material = new Material(null, $data['nombreMaterial'], $data['tipoMaterial'], $data['colorMaterial'], $data['cantidadDisponibleMaterial'], $data['Cliente_idCliente']);
        echo json_encode($dao->insertar($material));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idMaterial'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idMaterial"]);
            exit;
        }
        $material = new Material($data['idMaterial'], $data['nombreMaterial'], $data['tipoMaterial'], $data['colorMaterial'], $data['cantidadDisponibleMaterial'], $data['Cliente_idCliente']);
        echo json_encode($dao->actualizar($material));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idMaterial'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idMaterial"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idMaterial']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>