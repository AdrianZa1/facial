<?php
// Establecer la conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oroo-facial";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Obtener los datos del formulario
$correo = $_POST['correo'];
$nueva_contrasena = $_POST['nueva_contrasena']; // Hash de la nueva contraseña

// Construir y ejecutar la consulta SQL de actualización
$sql = "UPDATE registro SET contrasena = '$nueva_contrasena' WHERE correo_electronico = '$correo'";

if ($conn->query($sql) === TRUE) {
            // Mostrar mensaje de éxito
            header("Location: ../inicio-secion/index.html");
} else {
    echo "Error al actualizar la contraseña: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
