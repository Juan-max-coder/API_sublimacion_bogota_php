<?php
// Controlador REST para la entidad Usuario
header('Content-Type: application/json');
include '../conexion.php';
include '../model/Usuario.php';
include '../dao/UsuarioDAO.php';

// Se crea el objeto DAO para manejar las operaciones
$dao = new UsuarioDAO($conn);

// Se verifica el tipo de petición HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        // Si se consulta por correo
        if (isset($_GET['correoUsuario'])) {
            echo json_encode($dao->consultarPorCorreo($_GET['correoUsuario']));
        } else {
            // Listar todos los usuarios
            echo json_encode($dao->listar());
        }
        break;

    case 'POST':
        // Registrar nuevo usuario
        $data = json_decode(file_get_contents("php://input"), true);
        $usuario = new Usuario(null, $data['nombreUsuario'], $data['apellidoUsuario'], $data['correoUsuario'], $data['contrasenaUsuario']);
        echo json_encode($dao->insertar($usuario));
        break;

    case 'PUT':
        // Actualizar usuario existente
        $data = json_decode(file_get_contents("php://input"), true);
        $usuario = new Usuario($data['idUsuario'], $data['nombreUsuario'], $data['apellidoUsuario'], $data['correoUsuario'], $data['contrasenaUsuario']);
        echo json_encode($dao->actualizar($usuario));
        break;

    case 'DELETE':
        // Eliminar usuario por ID
        parse_str(file_get_contents("php://input"), $data);
        echo json_encode($dao->eliminar($data['idUsuario']));
        break;

    default:
        echo json_encode(["status"=>"error","message"=>"Método no permitido"]);
}