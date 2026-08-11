<?php
// Clase que representa la tabla Usuario en la base de datos
class Usuario {
    public $idUsuario;
    public $nombreUsuario;
    public $apellidoUsuario;
    public $correoUsuario;
    public $contrasenaUsuario;

    // Constructor para inicializar los datos del usuario
    public function __construct($idUsuario = null, $nombreUsuario = null, $apellidoUsuario = null, $correoUsuario = null, $contrasenaUsuario = null) {
        $this->idUsuario = $idUsuario;
        $this->nombreUsuario = $nombreUsuario;
        $this->apellidoUsuario = $apellidoUsuario;
        $this->correoUsuario = $correoUsuario;
        $this->contrasenaUsuario = $contrasenaUsuario;
    }
}
?>