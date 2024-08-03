<?php
// Configuración de la base de datos
$servername = "sql313.infinityfree.com";  // Nombre de host MySQL
$username = "si0_37017205";               // Nombre de usuario MySQL
$password = "qawsedrf@1";              // Contraseña MySQL (tu contraseña de vPanel)
$database = "if0_37017205_oro_facial"; 
// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


// Puedes realizar operaciones con la base de datos aquí

// Cerrar la conexión al finalizar

?>
