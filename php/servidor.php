<?php

require "conexion.php"; // se conecta al archivo de conexión

$data = json_decode(file_get_contents('php://input'), true); // decodifica los datos JSON

$nombre = $data['nombre'];
$cedula = $data['cedula'];
$email = $data['email'];
$contrasena = $data['contrasena'];
$contrasena2 = $data['contrasena2'];

if(empty($nombre) || empty($cedula) || empty($email) || empty($contrasena) || empty($contrasena)){
    echo "<span style='color:red;'>Llene todos los campos</span>";
} else if ($contrasena != $contrasena2){
    echo "<span style='color:red;'>Las contraseñas no coinciden</span>";
} else if (strpos($email, '@') === false) {
    echo "<span style='color:red;'>El correo electrónico no es válido</span>";
} else {
    $resultadoBD = mysqli_query($conexion, "INSERT into registro values('$nombre', '$cedula', '$email', '$contrasena')");//manda los datos a la base de datos
    echo "<span style = 'color:green';>"."gracias ". $nombre . " ". $email. "</span>";
}
mysqli_close($conexion); // cierra la conexión a la base de datos

?>