<?php
include '../../back/coneccion.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Consultar los datos de los módulos
$sql = "SELECT nombre FROM modulos";
$result = $conn->query($sql);

$modulos = [];
if ($result->num_rows > 0) {
    // Llenar array con los datos de los módulos
    while($row = $result->fetch_assoc()) {
        $modulos[] = $row;
    }
    echo json_encode($modulos);
} else {
    echo json_encode([]);
}
$conn->close();
?>
