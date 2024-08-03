<?php
// Configuración de la base de datos
$servername = "fdb1030.awardspace.net";
$username = "4511777_orofacial";
$password = "adrian1@";
$database = "4511777_orofacial";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


// Puedes realizar operaciones con la base de datos aquí

// Cerrar la conexión al finalizar

?>
