<?php
// Clase que representa la tabla DetallePedido en la base de datos
class DetallePedido {
    public $idDetalle;
    public $cantidadMaterial;
    public $precioUnitarioMaterial;
    public $costoManoDeObra;
    public $subtotalPedido;
    public $Pedido_idPedido;
    public $Material_idMaterial;
    public $Insumos_idInsumo;

    public function __construct($idDetalle = null, $cantidadMaterial = null, $precioUnitarioMaterial = null, $costoManoDeObra = null, $subtotalPedido = null, $Pedido_idPedido = null, $Material_idMaterial = null, $Insumos_idInsumo = null) {
        $this->idDetalle = $idDetalle;
        $this->cantidadMaterial = $cantidadMaterial;
        $this->precioUnitarioMaterial = $precioUnitarioMaterial;
        $this->costoManoDeObra = $costoManoDeObra;
        $this->subtotalPedido = $subtotalPedido;
        $this->Pedido_idPedido = $Pedido_idPedido;
        $this->Material_idMaterial = $Material_idMaterial;
        $this->Insumos_idInsumo = $Insumos_idInsumo;
    }
}
?>