<?php
// Clase que maneja las consultas SQL para la tabla Material
class MaterialDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar material
    public function insertar($material) {
        $sql = "INSERT INTO material (nombreMaterial, tipoMaterial, colorMaterial, cantidadDisponibleMaterial, Cliente_idCliente)
                VALUES ('$material->nombreMaterial', '$material->tipoMaterial', '$material->colorMaterial', '$material->cantidadDisponibleMaterial', '$material->Cliente_idCliente')";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Material registrado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al registrar material: " . $this->conn->error];
        }
    }

    // READ - listar materiales
    public function listar() {
        $sql = "SELECT * FROM material";
        $result = $this->conn->query($sql);
        $materiales = [];

        while ($row = $result->fetch_assoc()) {
            $materiales[] = $row;
        }

        return ["status" => "success", "data" => $materiales];
    }

    // UPDATE - actualizar material
    public function actualizar($material) {
        $sql = "UPDATE material SET 
                    nombreMaterial='$material->nombreMaterial',
                    tipoMaterial='$material->tipoMaterial',
                    colorMaterial='$material->colorMaterial',
                    cantidadDisponibleMaterial='$material->cantidadDisponibleMaterial',
                    Cliente_idCliente='$material->Cliente_idCliente'
                WHERE idMaterial=$material->idMaterial";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Material actualizado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al actualizar material: " . $this->conn->error];
        }
    }

    // DELETE - eliminar material
    public function eliminar($idMaterial) {
        $sql = "DELETE FROM material WHERE idMaterial=$idMaterial";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Material eliminado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al eliminar material: " . $this->conn->error];
        }
    }
}
?>