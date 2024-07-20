<?php
// Configuración de la base de datos
$servidor = "localhost";
$usuario = "root"; // usuario BD
$contrasena = "0000"; // contraseña BD
$base_de_datos = "servicio_web";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
