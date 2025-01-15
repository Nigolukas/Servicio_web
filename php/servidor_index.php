<?php
session_start();

require "conexion.php"; // se conecta al archivo de conexión

$data = json_decode(file_get_contents('php://input'), true); // decodifica los datos JSON

// Obtener los valores enviados por el formulario
$email = $data['email'];
$contrasena = $data['contrasena'];


$resultadoBD = mysqli_query($conexion, "SELECT * FROM registro WHERE email = '$email' AND contrasena = '$contrasena'"); 

if ($resultadoBD && $resultadoBD->num_rows > 0) {
  echo "<span style = 'color:green';>"."Inicio de sesión exitoso"."</span>";
  // Inicia la sesión

  $_SESSION['email'] = $email;

} else if( empty($email) || empty($contrasena)){
  echo  "<span style = 'color:red';>"."llene todos los campos"."</span>";
}
else{
  echo  "<span style = 'color:red';>"."Error: Usuario o contraseña incorrectos"."</span>";
}

mysqli_close($conexion);
?>