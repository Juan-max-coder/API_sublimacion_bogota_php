<?php
// Clase que representa la tabla Factura en la base de datos
class Factura {
    public $idFactura;
    public $estadoFactura;
    public $fechaExportacionFactura;
    public $fechaConfirmacionFactura;
    public $pedidoIdPedido;

    // Constructor para inicializar los datos
    public function __construct($idFactura = null, $estadoFactura = null, $fechaExportacionFactura = null, $fechaConfirmacionFactura = null, $pedidoIdPedido = null) {
        $this->idFactura = $idFactura;
        $this->estadoFactura = $estadoFactura;
        $this->fechaExportacionFactura = $fechaExportacionFactura;
        $this->fechaConfirmacionFactura = $fechaConfirmacionFactura;
        $this->pedidoIdPedido = $pedidoIdPedido;
    }
}
?>