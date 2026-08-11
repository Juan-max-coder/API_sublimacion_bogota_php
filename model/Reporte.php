<?php
// Clase que representa la tabla Reporte en la base de datos
class Reporte {
    public $idReporte;
    public $tipoReporte;
    public $fechaReporte;
    public $Usuario_idUsuario;

    // Constructor para inicializar los datos del reporte
    public function __construct($idReporte = null, $tipoReporte = null, $fechaReporte = null, $Usuario_idUsuario = null) {
        $this->idReporte = $idReporte;
        $this->tipoReporte = $tipoReporte;
        $this->fechaReporte = $fechaReporte;
        $this->Usuario_idUsuario = $Usuario_idUsuario;
    }
}
?>