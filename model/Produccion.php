<?php
// Clase que representa la tabla Produccion en la base de datos
class Produccion {
    public $idProduccion;
    public $fechaInicioProduccion;
    public $fechaFinProduccion;
    public $estadoProduccion;

    // Constructor para inicializar los datos de la producción
    public function __construct($idProduccion = null, $fechaInicioProduccion = null, $fechaFinProduccion = null, $estadoProduccion = null) {
        $this->idProduccion = $idProduccion;
        $this->fechaInicioProduccion = $fechaInicioProduccion;
        $this->fechaFinProduccion = $fechaFinProduccion;
        $this->estadoProduccion = $estadoProduccion;
    }
}
?>