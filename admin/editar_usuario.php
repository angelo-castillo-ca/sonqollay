<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the database connection file
include '../coneccion.php';

// Verificar si se enviaron datos de formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $correo = $_POST['correo'];
    $passwd = $_POST['passwd'];
    $rol = $_POST['rol'];
    $creditos = $_POST['creditos'];

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE usuarios SET apellido_paterno='$apellido_paterno', apellido_materno='$apellido_materno', correo='$correo', passwd='$passwd', rol='$rol', creditos='$creditos' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Si la actualización fue exitosa
        echo json_encode(['message' => 'Los cambios se guardaron correctamente']);
    } else {
        // Si hubo un error al actualizar los datos
        echo json_encode(['error' => 'Error al guardar los cambios: ' . $conn->error]);
    }
} else {
    // Si no se enviaron datos de formulario
    echo json_encode(['error' => 'No se recibieron datos de formulario']);
}

// Cerrar conexión
$conn->close();
?>
