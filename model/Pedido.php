<?php
// Clase que representa la tabla Pedido en la base de datos
class Pedido {
    public $idPedido;
    public $fechaRegistroPedido;
    public $estadoPedido;
    public $prioridadPedido;
    public $fechaEntregaEstimadaPedido;
    public $Material_idMaterial;
    public $Cliente_idCliente;
    public $Empleado_idEmpleado;

    // Constructor para inicializar los datos del pedido
    public function __construct($idPedido = null, $fechaRegistroPedido = null, $estadoPedido = null, $prioridadPedido = null, $fechaEntregaEstimadaPedido = null, $Material_idMaterial = null, $Cliente_idCliente = null, $Empleado_idEmpleado = null) {
        $this->idPedido = $idPedido;
        $this->fechaRegistroPedido = $fechaRegistroPedido;
        $this->estadoPedido = $estadoPedido;
        $this->prioridadPedido = $prioridadPedido;
        $this->fechaEntregaEstimadaPedido = $fechaEntregaEstimadaPedido;
        $this->Material_idMaterial = $Material_idMaterial;
        $this->Cliente_idCliente = $Cliente_idCliente;
        $this->Empleado_idEmpleado = $Empleado_idEmpleado;
    }
}
?>