<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicia la sesión para acceder a la información de la sesión
session_start();

    // Ahora puedes utilizar $userId en tu consulta u otras operaciones
    // Ejemplo de uso en una consulta
    include '../coneccion.php';

    $sql = "SELECT id, nombres,apellido_paterno,apellido_materno FROM usuario WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Procesar los resultados de la consulta
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Almacena el nombre del usuario en una variable de sesión
        $_SESSION['nombre_usuario'] = $row['nombres'];
        $_SESSION['nombre_completo_usuario'] = $row['nombres'] . ' ' . $row['apellido_paterno'];
    } else {
        // Manejar el caso en que no se encuentra el usuario
        echo "Error: No se encontró el usuario.";
    }

    $stmt->close();
    $conn->close();
} else {
    // El usuario no está autenticado, redirige a la página de inicio de sesión
    header("Location: login.php");
    exit();
}
?>
