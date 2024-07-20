<?php
// Iniciar sesión
session_start();

// Eliminar todas las variables de sesión
$_SESSION = array();

// Eliminar la sesión
session_destroy();

// Redirigir al formulario de inicio de sesión
header("Location: login.php");
exit();
?>
