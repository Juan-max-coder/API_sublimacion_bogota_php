<?php
class Cliente {
    public $idCliente;
    public $nombreCliente;
    public $apellidoCliente;
    public $direccionCliente;
    public $telefonoCliente;
    public $correoCliente;
    public $tipoCliente;

    public function __construct($idCliente = null, $nombreCliente = null, $apellidoCliente = null, $direccionCliente = null, $telefonoCliente = null, $correoCliente = null, $tipoCliente = null) {
        $this->idCliente = $idCliente;
        $this->nombreCliente = $nombreCliente;
        $this->apellidoCliente = $apellidoCliente;
        $this->direccionCliente = $direccionCliente;
        $this->telefonoCliente = $telefonoCliente;
        $this->correoCliente = $correoCliente;
        $this->tipoCliente = $tipoCliente;
    }
}
?>