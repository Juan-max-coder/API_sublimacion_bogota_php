<?php
// Clase que maneja las consultas SQL para la tabla TareaProduccion
class TareaProduccionDAO {
    private $conn;

    // Recibe la conexión a la base de datos
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar tarea
    public function insertar($tarea) {
        $sql = "INSERT INTO tareaproduccion (descripcionTarea, estadoTarea, avanceTarea, Empleado_idEmpleado, Produccion_idProduccion)
                VALUES ('$tarea->descripcionTarea', '$tarea->estadoTarea', '$tarea->avanceTarea', '$tarea->empleadoIdEmpleado', '$tarea->produccionIdProduccion')";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Tarea registrada correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al registrar tarea"];
        }
    }

    // READ - listar tareas
    public function listar() {
        $sql = "SELECT * FROM tareaproduccion";
        $result = $this->conn->query($sql);
        $tareas = [];
        while ($row = $result->fetch_assoc()) {
            $tareas[] = $row;
        }
        return ["status"=>"success","data"=>$tareas];
    }

    // UPDATE - actualizar tarea
    public function actualizar($tarea) {
        $sql = "UPDATE tareaproduccion SET descripcionTarea='$tarea->descripcionTarea', estadoTarea='$tarea->estadoTarea', avanceTarea='$tarea->avanceTarea', Empleado_idEmpleado='$tarea->empleadoIdEmpleado', Produccion_idProduccion='$tarea->produccionIdProduccion' WHERE idTarea=$tarea->idTarea";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Tarea actualizada correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al actualizar tarea"];
        }
    }

    // DELETE - eliminar tarea
    public function eliminar($idTarea) {
        $sql = "DELETE FROM tareaproduccion WHERE idTarea=$idTarea";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Tarea eliminada correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al eliminar tarea"];
        }
    }
}
?>