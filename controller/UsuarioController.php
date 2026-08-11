<?php
// Controlador REST para la entidad Usuario
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Usuario.php';
include '../dao/UsuarioDAO.php';

$dao = new UsuarioDAO($conn);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['correoUsuario'])) {
            echo json_encode($dao->consultarPorCorreo($_GET['correoUsuario']));
        } else {
            echo json_encode($dao->listar());
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!$data) {
            echo json_encode(["status" => "error", "message" => "Datos no válidos o cuerpo vacío"]);
            exit;
        }
        $usuario = new Usuario(null, $data['correoUsuario'], $data['contrasenaUsuario'], $data['rolUsuario']);
        echo json_encode($dao->insertar($usuario));
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['idUsuario'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idUsuario"]);
            exit;
        }
        $usuario = new Usuario($data['idUsuario'], $data['correoUsuario'], $data['contrasenaUsuario'], $data['rolUsuario']);
        echo json_encode($dao->actualizar($usuario));
        break;

    case 'DELETE':
        parse_str(file_get_contents("php://input"), $data);
        if (!isset($data['idUsuario'])) {
            echo json_encode(["status" => "error", "message" => "Falta el idUsuario"]);
            exit;
        }
        echo json_encode($dao->eliminar($data['idUsuario']));
        break;

    default:
        echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>