<?php
// Incluir el archivo de conexión
include('conexion.php');

// Obtener los datos de usuario y contraseña del formulario
$correo_electronico = $_POST['usuario'];
$contrasena = trim($_POST['clave']);

// Consultar la base de datos para obtener el usuario y sus roles (usando consulta preparada)
$sql = "SELECT role, rol_adicional FROM registro WHERE correo_electronico = ? AND contrasena = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $correo_electronico, $contrasena);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado && $resultado->num_rows > 0) {
    $user = $resultado->fetch_assoc();
    $tipo_usuario = $user['role'];
    $rol_adicional = $user['rol_adicional'];
    
    session_start();

    // Almacenar información del usuario en la sesión
    $_SESSION['correo_electronico'] = $correo_electronico;
    $_SESSION['role'] = $tipo_usuario;
    $_SESSION['rol_adicional'] = $rol_adicional;

    // Redirige a la interfaz correspondiente según el tipo de usuario
    if ($tipo_usuario == 'usuario_normal'&& $rol_adicional == 'ninguno') {
        header('Location: https://zamoraadrian117.wixsite.com/clinic-orofacial');
    } else {
        header('Location: ../pagina-principal/index.html');
    }
    exit();
} else {
    // Muestra un mensaje de error usando JavaScript o redirige a la página de inicio de sesión con un mensaje de error
    header('Location: ../pagina-de-error/index.html');
    exit();
}
?>
