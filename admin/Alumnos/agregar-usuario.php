<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the database connection file
include '../coneccion.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $firstName = $_POST['nombres'];
    $lastName1 = $_POST['apellido_materno'];
    $lastName2 = $_POST['apellido_paterno'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = 'user';
    $creditos = 0;

    // Hash de la contraseña (puedes usar algoritmos más seguros en un entorno de producción)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO usuario (nombres, apellido_materno,apellido_paterno, correo, passwd,rol,creditos) VALUES ('$firstName', '$lastName1', '$lastName2', '$email', '$hashedPassword', '$rol',$creditos)";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, redirige a la página de confirmación
        echo json_encode(['success' => true, 'message' => 'Los cambios se guardaron correctamente', 'redirect_url' => 'alumnos.html']);
        header("Location: alumnos.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}

// Close the database connection (optional since PHP automatically closes it at the end of the script)
$conn->close();
?>
