<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "oroo-facial";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


// Puedes realizar operaciones con la base de datos aquí

// Cerrar la conexión al finalizar

?>
