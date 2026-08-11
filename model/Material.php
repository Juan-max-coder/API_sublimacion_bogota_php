<?php
// Clase que representa la tabla Material en la base de datos
class Material {
    public $idMaterial;
    public $nombreMaterial;
    public $tipoMaterial;
    public $colorMaterial;
    public $cantidadDisponibleMaterial;
    public $Cliente_idCliente;

    // Constructor para inicializar los datos del material
    public function __construct($idMaterial = null, $nombreMaterial = null, $tipoMaterial = null, $colorMaterial = null, $cantidadDisponibleMaterial = null, $Cliente_idCliente = null) {
        $this->idMaterial = $idMaterial;
        $this->nombreMaterial = $nombreMaterial;
        $this->tipoMaterial = $tipoMaterial;
        $this->colorMaterial = $colorMaterial;
        $this->cantidadDisponibleMaterial = $cantidadDisponibleMaterial;
        $this->Cliente_idCliente = $Cliente_idCliente;
    }
}
?>