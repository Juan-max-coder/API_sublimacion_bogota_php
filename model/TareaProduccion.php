<?php
// Clase que representa la tabla TareaProduccion en la base de datos
class TareaProduccion {
    public $idTarea;
    public $descripcionTarea;
    public $estadoTarea;
    public $avanceTarea;
    public $Empleado_idEmpleado;
    public $Produccion_idProduccion;

    // Constructor para inicializar los datos de la tarea
    public function __construct($idTarea = null, $descripcionTarea = null, $estadoTarea = null, $avanceTarea = null, $Empleado_idEmpleado = null, $Produccion_idProduccion = null) {
        $this->idTarea = $idTarea;
        $this->descripcionTarea = $descripcionTarea;
        $this->estadoTarea = $estadoTarea;
        $this->avanceTarea = $avanceTarea;
        $this->Empleado_idEmpleado = $Empleado_idEmpleado;
        $this->Produccion_idProduccion = $Produccion_idProduccion;
    }
}
?>