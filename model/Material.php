<?php
// Clase que representa la tabla Material en la base de datos
class Material {
    public $idMaterial;
    public $nombreMaterial;
    public $tipoMaterial;
    public $colorMaterial;
    public $cantidadDisponibleMaterial;

    // Constructor para inicializar los datos del material
    public function __construct($idMaterial = null, $nombreMaterial = null, $tipoMaterial = null, $colorMaterial = null, $cantidadDisponibleMaterial = null) {
        $this->idMaterial = $idMaterial;
        $this->nombreMaterial = $nombreMaterial;
        $this->tipoMaterial = $tipoMaterial;
        $this->colorMaterial = $colorMaterial;
        $this->cantidadDisponibleMaterial = $cantidadDisponibleMaterial;
    }
}
?>