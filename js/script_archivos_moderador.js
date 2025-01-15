var resultado = document.getElementById("info");

document.addEventListener('DOMContentLoaded', function() {
    // Crear una instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();
  
    // Configurar la solicitud
    xhr.open('GET', 'php/servidor_archivos_moderador.php', true);
  
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


  function enviarcorreo(em){
    var ajaxrequest = new XMLHttpRequest();
    var ema = em

    var data = {
        email:ema,
    };
    var jsonData = JSON.stringify(data);

    ajaxrequest.onreadystatechange = function() {
        if (ajaxrequest.readyState == 4 && ajaxrequest.status == 200) {
          var mensaje = ajaxrequest.responseText;
          resultado.innerHTML = mensaje;
    
          if (mensaje.includes("exitoso")) {
            window.location.href = "estudiante1_docente1.html"; // Redirecciona a la página index.html
          }
    
        }
    }


    ajaxrequest.open("POST","php/servidor_archivos_moderador_2.php", true);
    ajaxrequest.setRequestHeader("Content-Type", "application/json");
    ajaxrequest.send(jsonData);

  }