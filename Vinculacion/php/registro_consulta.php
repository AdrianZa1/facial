<?php
include('conexion.php');

// Incluir las funciones de verificación de roles
include('funcion.php');

// Verificar roles principales y adicionales
checkRoles(['admin', 'registrador', 'medico']);

// Obtener los datos del formulario
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$fechaConsulta = $_POST['fecha_consulta'];
$horaConsulta = $_POST['hora_consulta'];
$diagnostico = $_POST['Diagnostico'];
$tratamientoRealizado = $_POST['Tratamiento_realizado'];
$indicaciones = $_POST['Indicaciones'];
$proximaCita = $_POST['Proxima_cita'];

// Prepara la consulta SQL
$sql = "INSERT INTO registro_consulta (Nombre, Apellido, fecha_consulta, hora_consulta, Diagnostico, Tratamiento_realizado, Indicaciones, proxima_cita) VALUES ('$nombre', '$apellido', '$fechaConsulta', '$horaConsulta', '$diagnostico', '$tratamientoRealizado', '$indicaciones', '$proximaCita')";

// Ejecuta la consulta y verifica
if ($conn->query($sql) === TRUE) {
    header('Location: ../registro_consulta/formulario2.html');
} else {
    echo "Error al almacenar datos: " . $conn->error;
}

$conn->close();
?>
