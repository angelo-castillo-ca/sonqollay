<?php
include '../coneccion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar la contraseña actual, nueva contraseña y repetir contraseña desde el formulario
    $pass_actual = $_POST["pass-actual"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password-repeat"];

    // Validar que las contraseñas coincidan
    if ($password != $password_repeat) {
        echo "Las contraseñas no coinciden.";
    } else {
        // Actualizar la contraseña en la base de datos
        // Aquí deberías mejorar la seguridad utilizando consultas preparadas
        $sql = "UPDATE usuario SET passwd = '$password' WHERE passwd = '$pass_actual'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Contraseña actualizada correctamente.";
            header("Location: index.php");
        } else {
            echo "Error al actualizar la contraseña: " . $conn->error;
        }
    }
}

// Cerrar la conexión
$conn->close();
?>
