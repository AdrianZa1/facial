<?php
include('conexion.php');

// Obtener el último id_paciente de la tabla datos_paciente
$sql_last_patient_id = "SELECT MAX(id_paciente) as last_patient_id FROM datos_paciente";
$result_last_patient_id = $conn->query($sql_last_patient_id);

if ($result_last_patient_id->num_rows > 0) {
    $row = $result_last_patient_id->fetch_assoc();
    $last_patient_id = $row['last_patient_id'];
} else {
    // Manejar el caso en que no hay pacientes registrados
    $last_patient_id = 0;
}

// Obtener los datos del formulario
$presion_arterial = $_POST['signo1'];
$frecuencia_cardiaca = $_POST['signo2'];
$temperatura = $_POST['signo3'];
$frecuencia_respiratoria = $_POST['signo4'];

// Utilizar el último id_paciente obtenido
$id_paciente = $last_patient_id+3;

// Insertar datos en la tabla
$sql = "INSERT INTO signos_vitales (presion_arterial, frecuencia_cardiaca, temperatura, frecuencia_respiratoria, id_paciente) VALUES ('$presion_arterial', '$frecuencia_cardiaca', '$temperatura', '$frecuencia_respiratoria', '$id_paciente')";

if ($conn->query($sql) === TRUE) {
    echo "Datos almacenados correctamente.";
} else {
    echo "Error al almacenar datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();

?>
