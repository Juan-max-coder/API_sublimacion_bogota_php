<?php
// Clase que maneja las consultas SQL para la tabla Pedido
class PedidoDAO {
    private $conn;

    // Recibe la conexión a la base de datos
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar pedido
    public function insertar($pedido) {
        $sql = "INSERT INTO pedido (fechaRegistroPedido, estadoPedido, prioridadPedido, fechaEntregaEstimadaPedido, Material_idMaterial, Cliente_idCliente, Empleado_idEmpleado)
                VALUES ('$pedido->fechaRegistroPedido', '$pedido->estadoPedido', '$pedido->prioridadPedido', '$pedido->fechaEntregaEstimadaPedido', '$pedido->materialIdMaterial', '$pedido->clienteIdCliente', '$pedido->empleadoIdEmpleado')";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Pedido registrado correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al registrar pedido"];
        }
    }

    // READ - listar pedidos
    public function listar() {
        $sql = "SELECT * FROM pedido";
        $result = $this->conn->query($sql);
        $pedidos = [];
        while ($row = $result->fetch_assoc()) {
            $pedidos[] = $row;
        }
        return ["status"=>"success","data"=>$pedidos];
    }

    // UPDATE - actualizar pedido
    public function actualizar($pedido) {
        $sql = "UPDATE pedido SET fechaRegistroPedido='$pedido->fechaRegistroPedido', estadoPedido='$pedido->estadoPedido', prioridadPedido='$pedido->prioridadPedido', fechaEntregaEstimadaPedido='$pedido->fechaEntregaEstimadaPedido', Material_idMaterial='$pedido->materialIdMaterial', Cliente_idCliente='$pedido->clienteIdCliente', Empleado_idEmpleado='$pedido->empleadoIdEmpleado' WHERE idPedido=$pedido->idPedido";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Pedido actualizado correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al actualizar pedido"];
        }
    }

    // DELETE - eliminar pedido
    public function eliminar($idPedido) {
        $sql = "DELETE FROM pedido WHERE idPedido=$idPedido";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Pedido eliminado correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al eliminar pedido"];
        }
    }
}
?>