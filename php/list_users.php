<?php
include('funcion.php');
checkRole(['admin']);

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oroo-facial";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar la eliminación de usuario
if (isset($_GET['delete_user'])) {
    $email = $_GET['delete_user'];

    $sql = "DELETE FROM usuarios WHERE email = '$email'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Usuario eliminado exitosamente.";
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }

    header('Location:../eliminar/index.html');
    exit();
}

// Consulta para obtener todos los usuarios
$sql = "SELECT email, role FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['email']}</td>
                <td>{$row['role']}</td>
                <td><a href='list_users.php?delete_user={$row['email']}' class='btn'>Eliminar</a></td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='3'>No hay usuarios registrados.</td></tr>";
}

$conn->close();
?>
