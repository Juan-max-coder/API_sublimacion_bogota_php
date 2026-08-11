<?php
// Clase que representa la tabla Pedido en la base de datos
class Pedido {
    public $idPedido;
    public $fechaRegistroPedido;
    public $estadoPedido;
    public $prioridadPedido;
    public $fechaEntregaEstimadaPedido;
    public $materialIdMaterial;
    public $clienteIdCliente;
    public $empleadoIdEmpleado;

    // Constructor para inicializar los datos del pedido
    public function __construct($idPedido = null, $fechaRegistroPedido = null, $estadoPedido = null, $prioridadPedido = null, $fechaEntregaEstimadaPedido = null, $materialIdMaterial = null, $clienteIdCliente = null, $empleadoIdEmpleado = null) {
        $this->idPedido = $idPedido;
        $this->fechaRegistroPedido = $fechaRegistroPedido;
        $this->estadoPedido = $estadoPedido;
        $this->prioridadPedido = $prioridadPedido;
        $this->fechaEntregaEstimadaPedido = $fechaEntregaEstimadaPedido;
        $this->materialIdMaterial = $materialIdMaterial;
        $this->clienteIdCliente = $clienteIdCliente;
        $this->empleadoIdEmpleado = $empleadoIdEmpleado;
    }
}
?>