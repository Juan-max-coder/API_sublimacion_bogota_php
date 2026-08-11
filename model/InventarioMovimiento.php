<?php
// Clase que representa la tabla InventarioMovimiento en la base de datos
class InventarioMovimiento {
    public $idMovimiento;
    public $tipoMovimiento;
    public $cantidadDelMovimiento;
    public $detallesDelMaterialEnMovimiento;
    public $materialIdMaterial;

    // Constructor para inicializar los datos del movimiento
    public function __construct($idMovimiento = null, $tipoMovimiento = null, $cantidadDelMovimiento = null, $detallesDelMaterialEnMovimiento = null, $materialIdMaterial = null) {
        $this->idMovimiento = $idMovimiento;
        $this->tipoMovimiento = $tipoMovimiento;
        $this->cantidadDelMovimiento = $cantidadDelMovimiento;
        $this->detallesDelMaterialEnMovimiento = $detallesDelMaterialEnMovimiento;
        $this->materialIdMaterial = $materialIdMaterial;
    }
}
?>