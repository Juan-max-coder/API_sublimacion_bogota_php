<?php
// Clase que representa la tabla Usuario en la base de datos
class Usuario {
    public $idUsuario;
    public $correoUsuario;
    public $contrasenaUsuario;
    public $rolUsuario;

    // Constructor para inicializar los datos del usuario
    public function __construct($idUsuario = null, $correoUsuario = null, $contrasenaUsuario = null, $rolUsuario = null) {
        $this->idUsuario = $idUsuario;
        $this->correoUsuario = $correoUsuario;
        $this->contrasenaUsuario = $contrasenaUsuario;
        $this->rolUsuario = $rolUsuario;
    }
}
?>