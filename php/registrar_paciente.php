<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $sexo = $_POST['sexo'];
    $direccion = $_POST['direccion'];
    $edad = $_POST['edad'];
    $ocupacion = $_POST['ocupacion'];
    $cedula = $_POST['cedula'];

    // Utiliza consultas preparadas para prevenir inyección de SQL
    $query = "INSERT INTO dataos_paciente (nombre, apellido, sexo, direccion, edad, ocupacion, cedula) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssiss', $nombre, $apellido, $sexo, $direccion, $edad, $ocupacion, $cedula);
    $stmt->execute();

    // Redirige a una página de éxito o a la página principal
    echo "datos ingresado";
} else {
    // Redirige a la página del formulario si se accede directamente a este script sin un envío de formulario
    echo "datos no ingresado ";
}
?>
