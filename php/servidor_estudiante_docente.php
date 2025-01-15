<?php
require "conexion.php"; // se conecta al archivo de conexión
session_start();
$docemail = $_SESSION['correo'];
// Obtener los usuarios de la base de datos
$resultadoBD = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE emadocente = '$docemail'");
$res = mysqli_query($conexion, "SELECT * FROM registro WHERE email = '$docemail'");
$row = mysqli_fetch_assoc($res);
$name = $row['nombre'];

// Verificar si hay resultados
if (mysqli_num_rows($resultadoBD) > 0) {
  // Recorrer los resultados y generar el HTML para cada usuario
  while ($row = mysqli_fetch_assoc($resultadoBD)) {
    $nombre = $row['nombre'];
    $tipo = $row['tipo'];

    // Generar el HTML para cada usuario
    echo '<div class="espacio-vacio">';
    echo '  <div class="rectangulo-blanco">';
    echo '    <h2 class="letra">' .$nombre  .'<br>' .'<span id = "email">'.$tipo .'</span>' . '</h2>';
    echo '    <a class="boton-azul" onclick = "enviarcorreo();" href="estudiante1_docente1.html">Ver mas</a>';
    echo '  </div>';
    echo '</div>';
  }
} else {
  // Si no hay usuarios en la base de datos, mostrar un mensaje alternativo
  echo 'No se encontraron estudiantes de '. $name;
}

mysqli_close($conexion); // cierra la conexión a la base de datos
?>