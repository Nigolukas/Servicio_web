var resultado = document.getElementById("info");

function ajaxpost(){
    var ema = document.getElementById("email").value;
    var con = document.getElementById("password").value;
    var ajaxrequest = new XMLHttpRequest();

    var data = {
        email:ema,
        contrasena:con   
    };
    var jsonData = JSON.stringify(data);

    ajaxrequest.onreadystatechange = function() {
        if (ajaxrequest.readyState == 4 && ajaxrequest.status == 200) {
          var mensaje = ajaxrequest.responseText;
          resultado.innerHTML = mensaje;
    
          if (mensaje.includes("exitoso")) {
            window.location.href = "archivos.html"; // Redirecciona a la página index.html
          }
    
        }
    }


    ajaxrequest.open("POST","php/servidor_index.php", true);
    ajaxrequest.setRequestHeader("Content-Type", "application/json");
    ajaxrequest.send(jsonData);
}