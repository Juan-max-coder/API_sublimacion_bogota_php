<?php
// Clase que representa la tabla Insumos en la base de datos
class Insumos {
    public $idInsumo;
    public $nombreInsumo;
    public $costoInsumo;
    public $stockInsumo;
    public $precioInsumo;
    public $InventarioMovimiento_idMovimiento;

    // Constructor para inicializar los datos del insumo
    public function __construct($idInsumo = null, $nombreInsumo = null, $costoInsumo = null, $stockInsumo = null, $precioInsumo = null, $InventarioMovimiento_idMovimiento = null) {
        $this->idInsumo = $idInsumo;
        $this->nombreInsumo = $nombreInsumo;
        $this->costoInsumo = $costoInsumo;
        $this->stockInsumo = $stockInsumo;
        $this->precioInsumo = $precioInsumo;
        $this->InventarioMovimiento_idMovimiento = $InventarioMovimiento_idMovimiento;
    }
}
?>