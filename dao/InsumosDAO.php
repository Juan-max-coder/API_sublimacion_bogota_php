<?php
// Clase que maneja las consultas SQL para la tabla Insumos
class InsumosDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar insumo
    public function insertar($insumo) {
        $sql = "INSERT INTO insumos (nombreInsumo, costoInsumo, stockInsumo, precioInsumo, InventarioMovimiento_idMovimiento)
                VALUES ('$insumo->nombreInsumo', '$insumo->costoInsumo', '$insumo->stockInsumo', '$insumo->precioInsumo', '$insumo->InventarioMovimiento_idMovimiento')";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Insumo registrado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al registrar insumo: " . $this->conn->error];
        }
    }

    // READ - listar insumos
    public function listar() {
        $sql = "SELECT * FROM insumos";
        $result = $this->conn->query($sql);
        $insumos = [];

        while ($row = $result->fetch_assoc()) {
            $insumos[] = $row;
        }

        return ["status" => "success", "data" => $insumos];
    }

    // UPDATE - actualizar insumo
    public function actualizar($insumo) {
        $sql = "UPDATE insumos SET 
                    nombreInsumo='$insumo->nombreInsumo',
                    costoInsumo='$insumo->costoInsumo',
                    stockInsumo='$insumo->stockInsumo',
                    precioInsumo='$insumo->precioInsumo',
                    InventarioMovimiento_idMovimiento='$insumo->InventarioMovimiento_idMovimiento'
                WHERE idInsumo=$insumo->idInsumo";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Insumo actualizado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al actualizar insumo: " . $this->conn->error];
        }
    }

    // DELETE - eliminar insumo
    public function eliminar($idInsumo) {
        $sql = "DELETE FROM insumos WHERE idInsumo=$idInsumo";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Insumo eliminado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al eliminar insumo: " . $this->conn->error];
        }
    }
}
?>