<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicia la sesión para acceder a la información de la sesión
session_start();

    // Ahora puedes utilizar $userId en tu consulta u otras operaciones
    // Ejemplo de uso en una consulta
    include '../coneccion.php';

// Inicia la sesión para acceder a la información de la sesión
session_start();
// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombres = $_POST['nombres'];
$apellido_paterno = $_POST['apellido_paterno'];
$apellido_materno = $_POST['apellido_materno'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashear la contraseña
$rol = 'user';
$creditos = 0;

// Preparar la consulta SQL
$sql = "INSERT INTO usuario (nombres, apellido_paterno, apellido_materno, correo, passwd, rol, creditos) 
        VALUES ('$nombres', '$apellido_paterno', '$apellido_materno', '$email', '$password', '$rol', $creditos)";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Usuario agregado correctamente";
} else {
    echo "Error al agregar usuario: " . $conn->error;
}

$conn->close();
?>
