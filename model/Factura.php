<?php
// Clase que representa la tabla Factura en la base de datos
class Factura {
    public $idFactura;
    public $estadoFactura;
    public $fechaExportacionFactura;
    public $fechaConfirmacionFactura;
    public $Pedido_idPedido;

    public function __construct($idFactura = null, $estadoFactura = null, $fechaExportacionFactura = null, $fechaConfirmacionFactura = null, $Pedido_idPedido = null) {
        $this->idFactura = $idFactura;
        $this->estadoFactura = $estadoFactura;
        $this->fechaExportacionFactura = $fechaExportacionFactura;
        $this->fechaConfirmacionFactura = $fechaConfirmacionFactura;
        $this->Pedido_idPedido = $Pedido_idPedido;
    }
}
?>