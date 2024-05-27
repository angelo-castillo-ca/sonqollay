<?php
include '../coneccion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el correo, nombres, apellido paterno y apellido materno desde el formulario
    $correo = $_POST["email"];
    $nombres = $_POST["first_name"];
    $ape_paterno = $_POST["last_name1"];
    $ape_materno = $_POST["last_name2"];

    // Preparar la consulta para actualizar los datos del usuario
    $sql = "UPDATE usuario SET correo = ?, nombres = ?, last_name1 = ?, last_name2 = ? WHERE correo = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Vincular los parámetros a la consulta
        $stmt->bind_param("sssss", $correo, $nombres, $ape_paterno, $ape_materno, $correo);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Datos actualizados correctamente";
            header("Location: index.php");
            exit();
        } else {
            echo "Error al actualizar los datos: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
