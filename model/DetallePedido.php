<?php
// Clase que representa la tabla DetallePedido en la base de datos
class DetallePedido {
    public $idDetalle;
    public $cantidadMaterial;
    public $precioUnitarioMaterial;
    public $costoManoDeObra;
    public $subtotalPedido;
    public $pedidoIdPedido;
    public $materialIdMaterial;
    public $insumosIdInsumo;

    // Constructor para inicializar los datos
    public function __construct($idDetalle = null, $cantidadMaterial = null, $precioUnitarioMaterial = null, $costoManoDeObra = null, $subtotalPedido = null, $pedidoIdPedido = null, $materialIdMaterial = null, $insumosIdInsumo = null) {
        $this->idDetalle = $idDetalle;
        $this->cantidadMaterial = $cantidadMaterial;
        $this->precioUnitarioMaterial = $precioUnitarioMaterial;
        $this->costoManoDeObra = $costoManoDeObra;
        $this->subtotalPedido = $subtotalPedido;
        $this->pedidoIdPedido = $pedidoIdPedido;
        $this->materialIdMaterial = $materialIdMaterial;
        $this->insumosIdInsumo = $insumosIdInsumo;
    }
}
?>