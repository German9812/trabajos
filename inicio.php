<?php
// Iniciar sesión
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>!</h2>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>
