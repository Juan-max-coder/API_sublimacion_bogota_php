<?php
// Clase que maneja las consultas SQL para la tabla Produccion
class ProduccionDAO {
    private $conn;

    // Recibe la conexión a la base de datos
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar producción
    public function insertar($produccion) {
        $sql = "INSERT INTO produccion (fechaInicioProduccion, fechaFinProduccion, estadoProduccion)
                VALUES ('$produccion->fechaInicioProduccion', '$produccion->fechaFinProduccion', '$produccion->estadoProduccion')";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Producción registrada correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al registrar producción"];
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
        return ["status"=>"success","data"=>$producciones];
    }

    // UPDATE - actualizar producción
    public function actualizar($produccion) {
        $sql = "UPDATE produccion SET fechaInicioProduccion='$produccion->fechaInicioProduccion', fechaFinProduccion='$produccion->fechaFinProduccion', estadoProduccion='$produccion->estadoProduccion' WHERE idProduccion=$produccion->idProduccion";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Producción actualizada correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al actualizar producción"];
        }
    }

    // DELETE - eliminar producción
    public function eliminar($idProduccion) {
        $sql = "DELETE FROM produccion WHERE idProduccion=$idProduccion";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Producción eliminada correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al eliminar producción"];
        }
    }
}
?>