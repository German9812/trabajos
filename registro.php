<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];
    
    // Encriptar la contraseña
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Preparar la consulta
    $sql = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre_usuario, $contrasena_encriptada);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h2></h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nombre de Usuario: <input type="text" name="nombre_usuario" required><br>
        Contraseña: <input type="password" name="contrasena" required><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
