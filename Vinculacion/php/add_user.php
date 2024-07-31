<?php
error_reporting(0); // Desactiva la visualización de errores
include('conexion.php');
include('funcion.php');
checkRole(['admin']);

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo_electronico = $_POST['correo_electronico'];
            $contrasena = $_POST['contrasena'];
            $role = $_POST['role'];
            $rol_adicional = $_POST['rol_adicional'];

            $sql = "INSERT INTO registro (correo_electronico, contrasena, role, rol_adicional) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssss', $correo_electronico, $contrasena, $role, $rol_adicional);

            if ($stmt->execute()) {
                echo "Usuario agregado exitosamente";
            } else {
                echo "Error al agregar el usuario: " . $stmt->error;
            }

            $stmt->close();
        }
        break;

    case 'delete':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo_electronico = $_POST['correo_electronico'];

            $sql = "DELETE FROM registro WHERE correo_electronico = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $correo_electronico);

            if ($stmt->execute()) {
                echo "Usuario eliminado exitosamente";
            } else {
                echo "Error al eliminar el usuario: " . $stmt->error;
            }

            $stmt->close();
        }
        break;

    case 'list':
        $sql = "SELECT correo_electronico, role, rol_adicional FROM registro";
        $result = $conn->query($sql);

        $users = array();
        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }

        $conn->close();
        echo json_encode($users);
        break;
    
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo_electronico = $_POST['correo_electronico'];
            $rol_adicional = $_POST['rol_adicional'];

            $sql = "UPDATE registro SET rol_adicional = ? WHERE correo_electronico = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $rol_adicional, $correo_electronico);

            if ($stmt->execute()) {
                echo "Rol adicional actualizado exitosamente";
            } else {
                echo "Error al actualizar el rol adicional: " . $stmt->error;
            }

            $stmt->close();
        }
        break;

    default:
        echo "Acción no válida";
}

$conn->close();
?>
