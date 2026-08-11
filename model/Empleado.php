<?php
// Clase que representa la tabla Empleado en la base de datos
class Empleado {
    public $idEmpleado;
    public $nombreEmpleado;
    public $cargoEmpleado;
    public $areaEmpleado;
    public $contactoEmpleado;
    public $usuarioIdUsuario;

    // Constructor para inicializar los datos del empleado
    public function __construct($idEmpleado = null, $nombreEmpleado = null, $cargoEmpleado = null, $areaEmpleado = null, $contactoEmpleado = null, $usuarioIdUsuario = null) {
        $this->idEmpleado = $idEmpleado;
        $this->nombreEmpleado = $nombreEmpleado;
        $this->cargoEmpleado = $cargoEmpleado;
        $this->areaEmpleado = $areaEmpleado;
        $this->contactoEmpleado = $contactoEmpleado;
        $this->usuarioIdUsuario = $usuarioIdUsuario;
    }
}
?>