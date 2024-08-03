<?php
// Incluir el archivo de conexión
include('conexion.php');

// Obtener los datos del formulario
$correo_electronico = $_POST['correo']; // Asegúrate de cambiar 'correo' por el nombre correcto del campo en tu formulario
$contrasena = trim($_POST['contrasena']);
$confirmar_contrasena = trim($_POST['confirmar_contrasena']);



// Puedes realizar más validaciones si es necesario (longitud de la contraseña, formato de correo, etc.)

// Consulta preparada para insertar el nuevo registro
$sql = "INSERT INTO registro (correo_electronico, contrasena) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $correo_electronico, $contrasena);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Redirigir al usuario a la página de inicio de sesión u otra página con un mensaje de éxito
    header('Location: ../index.html');
    exit();
} else {
    // Ocurrió un error al insertar en la base de datos, puedes redirigir al usuario a la página de registro con un mensaje de error
    header('Location: registro.php?error=bd');
    exit();
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
