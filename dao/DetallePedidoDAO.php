<?php
// Clase que maneja las consultas SQL para la tabla DetallePedido
class DetallePedidoDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // CREATE - insertar detalle
    public function insertar($detalle) {
        $sql = "INSERT INTO detallepedido (cantidadMaterial, precioUnitarioMaterial, costoManoDeObra, subtotalPedido, Pedido_idPedido, Material_idMaterial, Insumos_idInsumo)
                VALUES ('$detalle->cantidadMaterial', '$detalle->precioUnitarioMaterial', '$detalle->costoManoDeObra', '$detalle->subtotalPedido', '$detalle->Pedido_idPedido', '$detalle->Material_idMaterial', '$detalle->Insumos_idInsumo')";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Detalle insertado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al insertar detalle: " . $this->conn->error];
        }
    }

    // READ - listar detalles
    public function listar() {
        $sql = "SELECT * FROM detallepedido";
        $result = $this->conn->query($sql);
        $detalles = [];

        while ($row = $result->fetch_assoc()) {
            $detalles[] = $row;
        }

        return ["status" => "success", "data" => $detalles];
    }

    // UPDATE - actualizar detalle
    public function actualizar($detalle) {
        $sql = "UPDATE detallepedido SET 
                    cantidadMaterial='$detalle->cantidadMaterial',
                    precioUnitarioMaterial='$detalle->precioUnitarioMaterial',
                    costoManoDeObra='$detalle->costoManoDeObra',
                    subtotalPedido='$detalle->subtotalPedido',
                    Pedido_idPedido='$detalle->Pedido_idPedido',
                    Material_idMaterial='$detalle->Material_idMaterial',
                    Insumos_idInsumo='$detalle->Insumos_idInsumo'
                WHERE idDetalle=$detalle->idDetalle";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Detalle actualizado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al actualizar detalle: " . $this->conn->error];
        }
    }

    // DELETE - eliminar detalle
    public function eliminar($idDetalle) {
        $sql = "DELETE FROM detallepedido WHERE idDetalle=$idDetalle";
        if ($this->conn->query($sql)) {
            return ["status" => "success", "message" => "Detalle eliminado correctamente"];
        } else {
            return ["status" => "error", "message" => "Error al eliminar detalle: " . $this->conn->error];
        }
    }
}
?>