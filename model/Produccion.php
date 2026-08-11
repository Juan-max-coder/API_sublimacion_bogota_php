<?php
// Clase que representa la tabla Produccion en la base de datos
class Produccion {
    public $idProduccion;
    public $fechaInicioProduccion;
    public $fechaFinProduccion;
    public $estadoProduccion;
    public $Pedido_idPedido;

    // Constructor para inicializar los datos de la producción
    public function __construct($idProduccion = null, $fechaInicioProduccion = null, $fechaFinProduccion = null, $estadoProduccion = null, $Pedido_idPedido = null) {
        $this->idProduccion = $idProduccion;
        $this->fechaInicioProduccion = $fechaInicioProduccion;
        $this->fechaFinProduccion = $fechaFinProduccion;
        $this->estadoProduccion = $estadoProduccion;
        $this->Pedido_idPedido = $Pedido_idPedido;
    }
}
?>