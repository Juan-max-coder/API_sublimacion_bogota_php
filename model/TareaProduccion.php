<?php
// Clase que representa la tabla TareaProduccion en la base de datos
class TareaProduccion {
    public $idTarea;
    public $descripcionTarea;
    public $estadoTarea;
    public $avanceTarea;
    public $empleadoIdEmpleado;
    public $produccionIdProduccion;

    // Constructor para inicializar los datos de la tarea
    public function __construct($idTarea = null, $descripcionTarea = null, $estadoTarea = null, $avanceTarea = null, $empleadoIdEmpleado = null, $produccionIdProduccion = null) {
        $this->idTarea = $idTarea;
        $this->descripcionTarea = $descripcionTarea;
        $this->estadoTarea = $estadoTarea;
        $this->avanceTarea = $avanceTarea;
        $this->empleadoIdEmpleado = $empleadoIdEmpleado;
        $this->produccionIdProduccion = $produccionIdProduccion;
    }
}
?>