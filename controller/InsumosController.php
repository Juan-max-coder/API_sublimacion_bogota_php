<?php
// Controlador REST para la entidad Insumos
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Insumos.php';
include '../dao/InsumosDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new InsumosDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Listar insumos
        echo json_encode($dao->listar());
        break;

    case 'POST':
        // Registrar nuevo insumo
        $data = json_decode(file_get_contents("php://input"), true);
        $insumo = new Insumos(null, $data['nombreInsumo'], $data['costoInsumo'], $data['stockInsumo'], $data['precioInsumo']);
        echo json_encode($dao->insertar($insumo));
        break;

    case 'PUT':
        // Actualizar insumo existente
        $data = json_decode(file_get_contents("php://input"), true);
        $insumo = new Insumos($data['idInsumo'], $data['nombreInsumo'], $data['costoInsumo'], $data['stockInsumo'], $data['precioInsumo']);
        echo json_encode($dao->actualizar($insumo));
        break;

    case 'DELETE':
        // Eliminar insumo por ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idInsumo']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}
?>