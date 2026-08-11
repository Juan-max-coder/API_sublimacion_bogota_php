<?php
// Clase que representa la tabla Cliente en la base de datos
class Cliente {
    public $idCliente;
    public $nombre;
    public $correo;
    public $telefono;

    // Constructor para inicializar los datos del cliente
    public function __construct($idCliente = null, $nombre = null, $correo = null, $telefono = null) {
        $this->idCliente = $idCliente;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
    }
}
?>