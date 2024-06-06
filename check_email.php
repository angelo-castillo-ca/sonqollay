<?php
// Establecer el encabezado JSON antes de cualquier salida
header('Content-Type: application/json');

try {
    // Habilitar reporte de errores
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Include the database connection file
    include 'back/coneccion.php';

    // Verificar la conexión a la base de datos
    if ($conn->connect_error) {
        throw new Exception("Error de conexión: " . $conn->connect_error);
    }

    // Obtener el contenido del cuerpo de la solicitud
    $input = json_decode(file_get_contents('php://input'), true);
    if (!isset($input['email'])) {
        throw new Exception('Email is required');
    }
    $email = $input['email'];

    // Consulta para verificar si el correo electrónico ya está registrado
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuario WHERE correo = ?');
    if (!$stmt) {
        throw new Exception('Error al preparar la consulta');
    }

    if (!$stmt->execute([$email])) {
        throw new Exception('Error al ejecutar la consulta');
    }

    $count = $stmt->fetchColumn();

    // Devolver el resultado como JSON
    echo json_encode(['exists' => $count > 0]);
} catch (Exception $e) {
    // Manejo de errores
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>
