<?php
require "conexion.php"; // se conecta al archivo de conexión
session_start();
$docemail = $_SESSION['email'];
// Obtener los usuarios de la base de datos
$resultadoBD = mysqli_query($conexion, "SELECT * FROM estudiantes WHERE emadocente = '$docemail'");

// Verificar si hay resultados
if (mysqli_num_rows($resultadoBD) > 0) {
  // Recorrer los resultados y generar el HTML para cada usuario
  while ($row = mysqli_fetch_assoc($resultadoBD)) {
    $nombre = $row['nombre'];
    $codigo = $row['codigo'];
    $tipo = $row['tipo'];
    $_SESSION['codigo'] = $codigo;
    // Generar el HTML para cada usuario
    echo '<div class="espacio-vacio">';
    echo '  <div class="rectangulo-blanco">';
    echo '    <h2 class="letra">' . $nombre . '<br>' . $tipo . '</h2>';
    echo '    <a class="boton-azul" href="Subir_archivo.html">Subir archivo</a>';
    echo '  </div>';
    echo '</div>';
  }
} else {
  // Si no hay usuarios en la base de datos, mostrar un mensaje alternativo
  echo 'No se encontraron usuarios.';
}

mysqli_close($conexion); // cierra la conexión a la base de datos
?>