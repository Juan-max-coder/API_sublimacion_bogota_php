<?php
class ClienteDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Listar todos los clientes
    public function listar() {
        $sql = "SELECT * FROM cliente";
        $result = $this->conn->query($sql);
        $clientes = [];

        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }

        return ["status" => "success", "data" => $clientes];
    }

    // Registrar nuevo cliente
    public function registrar($cliente) {
        $sql = "INSERT INTO cliente (nombreCliente, apellidoCliente, direccionCliente, telefonoCliente, correoCliente, tipoCliente)
                VALUES ('$cliente->nombreCliente', '$cliente->apellidoCliente', '$cliente->direccionCliente', '$cliente->telefonoCliente', '$cliente->correoCliente', '$cliente->tipoCliente')";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Cliente registrado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al registrar cliente: " . $this->conn->error];
        }
    }

    // Actualizar cliente existente
    public function actualizar($cliente) {
        $sql = "UPDATE cliente SET 
                    nombreCliente='$cliente->nombreCliente', 
                    apellidoCliente='$cliente->apellidoCliente', 
                    direccionCliente='$cliente->direccionCliente', 
                    telefonoCliente='$cliente->telefonoCliente', 
                    correoCliente='$cliente->correoCliente', 
                    tipoCliente='$cliente->tipoCliente' 
                WHERE idCliente=$cliente->idCliente";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Cliente actualizado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al actualizar cliente: " . $this->conn->error];
        }
    }

    // Eliminar cliente por ID
    public function eliminar($idCliente) {
        $sql = "DELETE FROM cliente WHERE idCliente=$idCliente";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Cliente eliminado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al eliminar cliente: " . $this->conn->error];
        }
    }
}
?>