<?php
// Clase que maneja las consultas SQL para la tabla Usuario
class UsuarioDAO {
    private $conn;

    // Recibe la conexión a la base de datos
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar usuario
    public function insertar($usuario) {
        $sql = "INSERT INTO usuario (nombreUsuario, apellidoUsuario, correoUsuario, contrasenaUsuario)
                VALUES ('$usuario->nombreUsuario', '$usuario->apellidoUsuario', '$usuario->correoUsuario', '$usuario->contrasenaUsuario')";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Usuario registrado correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al registrar usuario"];
        }
    }

    // READ - listar usuarios
    public function listar() {
        $sql = "SELECT * FROM usuario";
        $result = $this->conn->query($sql);
        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
        return ["status"=>"success","data"=>$usuarios];
    }

    // READ - consultar por correo
    public function consultarPorCorreo($correoUsuario) {
        $sql = "SELECT * FROM usuario WHERE correoUsuario='$correoUsuario'";
        $result = $this->conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            return ["status"=>"success","data"=>$row];
        } else {
            return ["status"=>"error","message"=>"Usuario no encontrado"];
        }
    }

    // UPDATE - actualizar usuario
    public function actualizar($usuario) {
        $sql = "UPDATE usuario SET nombreUsuario='$usuario->nombreUsuario', apellidoUsuario='$usuario->apellidoUsuario', correoUsuario='$usuario->correoUsuario', contrasenaUsuario='$usuario->contrasenaUsuario' WHERE idUsuario=$usuario->idUsuario";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Usuario actualizado correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al actualizar usuario"];
        }
    }

    // DELETE - eliminar usuario
    public function eliminar($idUsuario) {
        $sql = "DELETE FROM usuario WHERE idUsuario=$idUsuario";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Usuario eliminado correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al eliminar usuario"];
        }
    }
}
?>