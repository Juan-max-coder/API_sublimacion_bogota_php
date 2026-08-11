<?php
// Clase que maneja las consultas SQL relacionadas con los clientes
class ClienteDAO {
    private $conn;

    // Recibe la conexión a la base de datos
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Método para listar todos los clientes
    public function listar() {
        $sql = "SELECT * FROM cliente";
        $result = $this->conn->query($sql);
        $clientes = [];

        // Recorre los resultados y los guarda en un arreglo
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }

        return ["status" => "success", "data" => $clientes];
    }

    // Método para registrar un nuevo cliente
    public function registrar($cliente) {
        $sql = "INSERT INTO cliente (nombre, correo, telefono) VALUES ('$cliente->nombre', '$cliente->correo', '$cliente->telefono')";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Cliente registrado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al registrar cliente"];
        }
    }

    // Método para actualizar los datos de un cliente
    public function actualizar($cliente) {
        $sql = "UPDATE cliente SET nombre='$cliente->nombre', correo='$cliente->correo', telefono='$cliente->telefono' WHERE idCliente=$cliente->idCliente";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Cliente actualizado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al actualizar cliente"];
        }
    }

    // Método para eliminar un cliente por su ID
    public function eliminar($id) {
        $sql = "DELETE FROM cliente WHERE idCliente=$id";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Cliente eliminado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al eliminar cliente"];
        }
    }
}
?>