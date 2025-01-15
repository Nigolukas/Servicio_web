document.addEventListener('DOMContentLoaded', function() {
    // Crear una instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();
  
    // Configurar la solicitud
    xhr.open('GET', 'php/servidor_archivos.php', true);
  
    // Manejar la respuesta de la solicitud
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Insertar los resultados en el div con el id "info"
        document.getElementById('info').innerHTML = xhr.responseText;
      } else {
        console.log('Error en la solicitud. Código de estado: ' + xhr.status);
      }
    };
  
    // Enviar la solicitud
    xhr.send();
  });