<?php
require "conexion.php"; // se conecta al archivo de conexión
session_start();
$docemail = $_SESSION['email'];
// Obtener los usuarios de la base de datos
$resultadoBD = mysqli_query($conexion, "SELECT * FROM registro");

// Verificar si hay resultados
if (mysqli_num_rows($resultadoBD) > 0) {
  // Recorrer los resultados y generar el HTML para cada usuario
  while ($row = mysqli_fetch_assoc($resultadoBD)) {
    $nombre = $row['nombre'];
    $email = $row['email'];
    $cedula = $row['cedula'];
    $_SESSION['codigo'] = $cedula;
    // Generar el HTML para cada usuario
    echo '<div class="espacio-vacio">';
    echo '  <div class="rectangulo-blanco">';
    echo '    <h2 class="letra">' .$nombre  .'<br>'.'</h2>';
  echo '    <input type="button" class="boton-azul" onclick = "enviarcorreo(\''.$email.'\');" value = "ver mas"></button>';
    echo '  </div>';
    echo '</div>';
  }
} else {
  // Si no hay usuarios en la base de datos, mostrar un mensaje alternativo
  echo 'No se encontraron docentes.';
}

mysqli_close($conexion); // cierra la conexión a la base de datos
?>