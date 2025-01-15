<?php
session_start();

require "conexion.php"; // se conecta al archivo de conexión

$data = json_decode(file_get_contents('php://input'), true); // decodifica los datos JSON

// Obtener los valores enviados por el formulario
$_SESSION['correo'] = $data['email'];

echo "exitoso";

mysqli_close($conexion);
?>