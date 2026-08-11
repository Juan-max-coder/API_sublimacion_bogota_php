<?php
// Clase que maneja las consultas SQL para la tabla Reporte
class ReporteDAO {
    private $conn;

    // Recibe la conexión a la base de datos
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar reporte
    public function insertar($reporte) {
        $sql = "INSERT INTO reporte (tipoReporte, fechaReporte, Usuario_idUsuario)
                VALUES ('$reporte->tipoReporte', '$reporte->fechaReporte', '$reporte->usuarioIdUsuario')";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Reporte registrado correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al registrar reporte"];
        }
    }

    // READ - listar reportes
    public function listar() {
        $sql = "SELECT * FROM reporte";
        $result = $this->conn->query($sql);
        $reportes = [];
        while ($row = $result->fetch_assoc()) {
            $reportes[] = $row;
        }
        return ["status"=>"success","data"=>$reportes];
    }

    // UPDATE - actualizar reporte
    public function actualizar($reporte) {
        $sql = "UPDATE reporte SET tipoReporte='$reporte->tipoReporte', fechaReporte='$reporte->fechaReporte', Usuario_idUsuario='$reporte->usuarioIdUsuario' WHERE idReporte=$reporte->idReporte";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Reporte actualizado correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al actualizar reporte"];
        }
    }

    // DELETE - eliminar reporte
    public function eliminar($idReporte) {
        $sql = "DELETE FROM reporte WHERE idReporte=$idReporte";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Reporte eliminado correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al eliminar reporte"];
        }
    }
}
?>