<?php
// Clase que representa la tabla InventarioMovimiento en la base de datos
class InventarioMovimiento {
    public $idMovimiento;
    public $tipoMovimiento;
    public $cantidadDelMovimiento;
    public $detallesDelMaterialEnMovimiento;
    public $Material_idMaterial;

    public function __construct($idMovimiento = null, $tipoMovimiento = null, $cantidadDelMovimiento = null, $detallesDelMaterialEnMovimiento = null, $Material_idMaterial = null) {
        $this->idMovimiento = $idMovimiento;
        $this->tipoMovimiento = $tipoMovimiento;
        $this->cantidadDelMovimiento = $cantidadDelMovimiento;
        $this->detallesDelMaterialEnMovimiento = $detallesDelMaterialEnMovimiento;
        $this->Material_idMaterial = $Material_idMaterial;
    }
}
?>