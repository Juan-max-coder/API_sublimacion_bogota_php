<?php
// Clase que maneja las consultas SQL para la tabla InventarioMovimiento
class InventarioMovimientoDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar movimiento
    public function insertar($movimiento) {
        $sql = "INSERT INTO inventariomovimiento (tipoMovimiento, cantidadDelMovimiento, detallesDelMaterialEnMovimiento, Material_idMaterial)
                VALUES ('$movimiento->tipoMovimiento', '$movimiento->cantidadDelMovimiento', '$movimiento->detallesDelMaterialEnMovimiento', '$movimiento->Material_idMaterial')";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Movimiento registrado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al registrar movimiento: " . $this->conn->error];
        }
    }

    // READ - listar movimientos
    public function listar() {
        $sql = "SELECT * FROM inventariomovimiento";
        $result = $this->conn->query($sql);
        $movimientos = [];

        while ($row = $result->fetch_assoc()) {
            $movimientos[] = $row;
        }

        return ["status" => "success", "data" => $movimientos];
    }

    // UPDATE - actualizar movimiento
    public function actualizar($movimiento) {
        $sql = "UPDATE inventariomovimiento SET 
                    tipoMovimiento='$movimiento->tipoMovimiento',
                    cantidadDelMovimiento='$movimiento->cantidadDelMovimiento',
                    detallesDelMaterialEnMovimiento='$movimiento->detallesDelMaterialEnMovimiento',
                    Material_idMaterial='$movimiento->Material_idMaterial'
                WHERE idMovimiento=$movimiento->idMovimiento";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Movimiento actualizado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al actualizar movimiento: " . $this->conn->error];
        }
    }

    // DELETE - eliminar movimiento
    public function eliminar($idMovimiento) {
        $sql = "DELETE FROM inventariomovimiento WHERE idMovimiento=$idMovimiento";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Movimiento eliminado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al eliminar movimiento: " . $this->conn->error];
        }
    }
}
?>