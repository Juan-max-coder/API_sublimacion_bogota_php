<?php
// Clase que maneja las consultas SQL para la tabla Empleado
class EmpleadoDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar empleado
    public function insertar($empleado) {
        $sql = "INSERT INTO empleado (nombreEmpleado, cargoEmpleado, areaEmpleado, contactoEmpleado, Usuario_idUsuario)
                VALUES ('$empleado->nombreEmpleado', '$empleado->cargoEmpleado', '$empleado->areaEmpleado', '$empleado->contactoEmpleado', '$empleado->Usuario_idUsuario')";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Empleado registrado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al registrar empleado: " . $this->conn->error];
        }
    }

    // READ - listar empleados
    public function listar() {
        $sql = "SELECT * FROM empleado";
        $result = $this->conn->query($sql);
        $empleados = [];

        while ($row = $result->fetch_assoc()) {
            $empleados[] = $row;
        }

        return ["status" => "success", "data" => $empleados];
    }

    // UPDATE - actualizar empleado
    public function actualizar($empleado) {
        $sql = "UPDATE empleado SET 
                    nombreEmpleado='$empleado->nombreEmpleado',
                    cargoEmpleado='$empleado->cargoEmpleado',
                    areaEmpleado='$empleado->areaEmpleado',
                    contactoEmpleado='$empleado->contactoEmpleado',
                    Usuario_idUsuario='$empleado->Usuario_idUsuario'
                WHERE idEmpleado=$empleado->idEmpleado";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Empleado actualizado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al actualizar empleado: " . $this->conn->error];
        }
    }

    // DELETE - eliminar empleado
    public function eliminar($idEmpleado) {
        $sql = "DELETE FROM empleado WHERE idEmpleado=$idEmpleado";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Empleado eliminado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al eliminar empleado: " . $this->conn->error];
        }
    }
}
?>