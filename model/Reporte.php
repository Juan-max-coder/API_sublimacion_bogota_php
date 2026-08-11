<?php
// Clase que representa la tabla Reporte en la base de datos
class Reporte {
    public $idReporte;
    public $tipoReporte;
    public $fechaReporte;
    public $usuarioIdUsuario;

    // Constructor para inicializar los datos del reporte
    public function __construct($idReporte = null, $tipoReporte = null, $fechaReporte = null, $usuarioIdUsuario = null) {
        $this->idReporte = $idReporte;
        $this->tipoReporte = $tipoReporte;
        $this->fechaReporte = $fechaReporte;
        $this->usuarioIdUsuario = $usuarioIdUsuario;
    }
}
?>