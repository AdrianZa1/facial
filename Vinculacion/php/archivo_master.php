<?php
 // Incluir la función checkRole
include('funcion.php');

// Verificar que el usuario tenga permiso para buscar pacientes
checkRole(['admin', 'registrador','medico']);
include('conexion.php');

// Obtener los datos del formulario de paciente
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$sexo = $_POST['sexo'];
$direccion = $_POST['direccion'];
$edad = $_POST['edad'];
$ocupacion = $_POST['ocupacion'];
$cedula = $_POST['cedula'];

// Prepara la consulta SQL para la tabla de pacientes
$sqlPaciente = "INSERT INTO dataos_paciente (nombre, apellido, sexo, direccion, edad, ocupacion, cedula) 
        VALUES ('$nombre', '$apellido', '$sexo', '$direccion', '$edad', '$ocupacion', '$cedula')";
        $id_paciente = $conn->insert_id;

// Obtener los datos del formulario de consulta
$motivo_consulta = $_POST['detalle-consulta'];
$problema_actual = $_POST['detalle-problema'];
$enfermedad = $_POST['antecedentes-medicos'];

// Prepara la consulta SQL para la tabla de detalles de consulta
$sqlDetalleConsulta = "INSERT INTO consulta (motivo_consulta, problema_actual, enfermedades_hereditaria) 
VALUES ('$motivo_consulta', '$problema_actual', '$enfermedad')";

// Obtener los datos del formulario de signos vitales
$presion_arterial = $_POST['signo1'];
$frecuencia_cardiaca = $_POST['signo2'];
$temperatura = $_POST['signo3'];
$frecuencia_respiratoria = $_POST['signo4'];

// Prepara la consulta SQL para la tabla de signos vitales
$sqlSignosVitales = "INSERT INTO signos_vitales (presion_arterial, frecuencia_cardiaca, temperatura, frecuencia_respiratoria, id_paciente) 
VALUES ('$presion_arterial', '$frecuencia_cardiaca', '$temperatura', '$frecuencia_respiratoria', '$id_paciente')";

// Ejecuta las consultas y verifica

?>
