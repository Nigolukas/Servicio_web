function enviarDatos(url, codigo) {
    // Crear un formulario dinámico
    var form = document.createElement('form');
    form.method = 'POST';
    form.action = 'archivo_subido.php';
  
    // Agregar el código como un campo oculto en el formulario
    var inputCodigo = document.createElement('input');
    inputCodigo.type = 'hidden';
    inputCodigo.name = 'codigo';
    inputCodigo.value = codigo;
    form.appendChild(inputCodigo);
  
    // Adjuntar el formulario al documento y enviarlo
    document.body.appendChild(form);
    form.submit();
  
    // Redireccionar a Subir_archivos.html
    window.location.href = url;
  }