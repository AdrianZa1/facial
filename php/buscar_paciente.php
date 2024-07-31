<?php
// Incluir la función checkRole

 // Incluir la función checkRole
 include('funcion.php');

 // Verificar que el usuario tenga permiso para buscar pacientes
 checkRole(['admin', 'secretaria', 'medico']);
 include('conexion.php');

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre del paciente desde la URL
$nombrePaciente = $_GET['nombre'];

// Consulta SQL para obtener los datos de la tabla registro_consulta (ordenados por nombre ascendente)
$sql = "SELECT Nombre, Apellido, Diagnostico, Tratamiento_realizado, Indicaciones, proxima_cita 
        FROM registro_consulta 
        WHERE Nombre LIKE '%$nombrePaciente%' 
        ORDER BY Nombre ASC";

$result = $conn->query($sql);

// Verificar si la consulta fue exitosa
if ($result === false) {
    echo "Error al agregar el usuario: " . $stmt->error;
}

// Crear un array asociativo con los resultados
$rows = array();
while($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Convertir el array a formato JSON
$json_data = json_encode($rows);

// Establecer el encabezado para indicar que la respuesta es JSON
header('Content-Type: application/json; charset=utf-8');

// Enviar los datos JSON de vuelta a la página HTML
echo $json_data;
?>
