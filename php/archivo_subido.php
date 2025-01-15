<?php

session_start();
require "conexion.php"; // se conecta al archivo de conexión
//header("Location: subir_archivo.html");
$observaciones = $_POST['observaciones'];

// Verificar si se seleccionó un archivo
if ($_FILES['archivo']['name']) {
  $archivo_nombre = $_FILES['archivo']['name'];
  $archivo_tmp = $_FILES['archivo']['tmp_name'];
  $archivo_ruta = 'C:/xampp/htdocs/servicio_web/archivos/' . $archivo_nombre; // Define la ruta donde se guardará el archivo
  $Ecodigo= '';
  // Mueve el archivo a la ruta especificada
  move_uploaded_file($archivo_tmp, $archivo_ruta);

  // Guarda la ruta del archivo en la base de datos
  $resultadoBD = mysqli_query($conexion, "INSERT INTO archivos  values('','$archivo_ruta', '$observaciones','$Ecodigo')");

  if ($resultadoBD) {
    echo "<span style='color:green;'>Archivo subido y registrado correctamente.</span>";
  } else {
    echo "<span style='color:red;'>Error al subir el archivo.</span>";
  }
} else {
  echo "<span style='color:red;'>No se seleccionó ningún archivo.</span>";
}

mysqli_close($conexion); // cierra la conexión a la base de datos
?>