<?php
$host = "localhost";
$port = "3307";
$user = "root";
$password = "mayis2007";
$dbname = "sublimacion_bogota";

$conn = new mysqli($host, $user, $password, $dbname, $port);

if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Error en la conexión: " . $conn->connect_error
    ]));
} else {
    // Puedes dejar esto comentado para evitar que se muestre en producción
    // echo json_encode(["status" => "success", "message" => "Conexión exitosa a la base de datos"]);
}
?>