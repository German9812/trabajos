<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Iniciar sesión
session_start();

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Preparar la consulta
    $sql = "SELECT contrasena FROM usuarios WHERE nombre_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombre_usuario);
    $stmt->execute();
    $stmt->store_result();
    
    // Verificar si el usuario existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($contrasena_encriptada);
        $stmt->fetch();
        
        // Verificar la contraseña
        if (password_verify($contrasena, $contrasena_encriptada)) {
            // Guardar información del usuario en la sesión
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            header("Location: inicio.php");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Nombre de usuario no encontrado.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <h2></h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nombre de Usuario: <input type="text" name="nombre_usuario" required><br>
        Contraseña: <input type="password" name="contrasena" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
