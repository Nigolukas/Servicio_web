<?php

require "conexion.php"; // se conecta al archivo de conexión

$data = json_decode(file_get_contents('php://input'), true); // decodifica los datos JSON

$nombre = $data['nombre'];
$codigo = $data['codigo'];
$email = $data['email'];
$tipo = "pregrado";

if(empty($nombre) || empty($codigo) || empty($email)){
    echo "<span style = 'color:red';>"."llene todos los campos"."</span>";
}
else if (strpos($email, '@') === false) {
    echo "<span style='color:red;'>El correo electrónico no es válido</span>";
}
else{
    session_start();
    $docemail = $_SESSION['email'];
    $resultadoBD = mysqli_query($conexion, "INSERT into estudiantes values('$nombre', '$codigo', '$email', '$tipo', '$docemail')");//manda los datos a la base de datos

    echo "<span style = 'color:green';>"."gracias ". $nombre . " ". $email. "</span>";
    mysqli_close($conexion); // cierra la conexión a la base de datos
}


?>