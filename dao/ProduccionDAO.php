<?php
// Clase que maneja las consultas SQL para la tabla Produccion
class ProduccionDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar producción
    public function insertar($produccion) {
        $sql = "INSERT INTO produccion (fechaInicioProduccion, fechaFinProduccion, estadoProduccion, Pedido_idPedido)
                VALUES ('$produccion->fechaInicioProduccion', '$produccion->fechaFinProduccion', '$produccion->estadoProduccion', '$produccion->Pedido_idPedido')";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Producción registrada correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al registrar producción: " . $this->conn->error];
        }
    }

    // READ - listar producciones
    public function listar() {
        $sql = "SELECT * FROM produccion";
        $result = $this->conn->query($sql);
        $producciones = [];

        while ($row = $result->fetch_assoc()) {
            $producciones[] = $row;
        }

        return ["status" => "success", "data" => $producciones];
    }

    // UPDATE - actualizar producción
    public function actualizar($produccion) {
        $sql = "UPDATE produccion SET 
                    fechaInicioProduccion='$produccion->fechaInicioProduccion',
                    fechaFinProduccion='$produccion->fechaFinProduccion',
                    estadoProduccion='$produccion->estadoProduccion',
                    Pedido_idPedido='$produccion->Pedido_idPedido'
                WHERE idProduccion=$produccion->idProduccion";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Producción actualizada correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al actualizar producción: " . $this->conn->error];
        }
    }

    // DELETE - eliminar producción
    public function eliminar($idProduccion) {
        $sql = "DELETE FROM produccion WHERE idProduccion=$idProduccion";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Producción eliminada correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al eliminar producción: " . $this->conn->error];
        }
    }
}
?>