<?php
// Clase que maneja las consultas SQL para la tabla Factura
class FacturaDAO {
    private $conn;

    // Recibe la conexión a la base de datos
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar factura
    public function insertar($factura) {
        $sql = "INSERT INTO factura (estadoFactura, fechaExportacionFactura, fechaConfirmacionFactura, Pedido_idPedido)
                VALUES ('$factura->estadoFactura', '$factura->fechaExportacionFactura', '$factura->fechaConfirmacionFactura', '$factura->pedidoIdPedido')";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Factura registrada correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al registrar factura"];
        }
    }

    // READ - listar facturas
    public function listar() {
        $sql = "SELECT * FROM factura";
        $result = $this->conn->query($sql);
        $facturas = [];
        while ($row = $result->fetch_assoc()) {
            $facturas[] = $row;
        }
        return ["status"=>"success","data"=>$facturas];
    }

    // UPDATE - actualizar factura
    public function actualizar($factura) {
        $sql = "UPDATE factura SET estadoFactura='$factura->estadoFactura', fechaExportacionFactura='$factura->fechaExportacionFactura', fechaConfirmacionFactura='$factura->fechaConfirmacionFactura', Pedido_idPedido='$factura->pedidoIdPedido' WHERE idFactura=$factura->idFactura";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Factura actualizada correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al actualizar factura"];
        }
    }

    // DELETE - eliminar factura
    public function eliminar($idFactura) {
        $sql = "DELETE FROM factura WHERE idFactura=$idFactura";
        if ($this->conn->query($sql)) {
            return ["status"=>"success","message"=>"Factura eliminada correctamente"];
        } else {
            return ["status"=>"error","message"=>"Error al eliminar factura"];
        }
    }
}
?>