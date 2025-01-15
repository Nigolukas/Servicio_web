var resultado = document.getElementById("info");

function ajaxposgrado(){
    var nom = document.getElementById("nombre").value;
    var cod = document.getElementById("codigo").value;
    var ema = document.getElementById("email").value;
    var ajaxrequest = new XMLHttpRequest();

    var data = {
        nombre:nom,
        codigo:cod,
        email:ema
    };
    var jsonData = JSON.stringify(data);

    ajaxrequest.onreadystatechange = function() {
        if (ajaxrequest.readyState == 4 && ajaxrequest.status == 200) {
          var mensaje = ajaxrequest.responseText;
          resultado.innerHTML = mensaje;
    
          if (mensaje.includes("gracias")) {
            window.location.href = "archivos.html"; 
          }
    
        }
    }


    ajaxrequest.open("POST","php/pos_ser_registro_estudiantes.php", true);
    ajaxrequest.setRequestHeader("Content-Type", "application/json");
    ajaxrequest.send(jsonData);
}


function ajaxpregrado(){
    var nom = document.getElementById("nombre").value;
    var cod = document.getElementById("codigo").value;
    var ema = document.getElementById("email").value;
    var ajaxrequest = new XMLHttpRequest();

    var data = {
        nombre:nom,
        codigo:cod,
        email:ema
    };
    var jsonData = JSON.stringify(data);

    ajaxrequest.onreadystatechange = function() {
        if (ajaxrequest.readyState == 4 && ajaxrequest.status == 200) {
          var mensaje = ajaxrequest.responseText;
          resultado.innerHTML = mensaje;
    
          if (mensaje.includes("gracias")) {
            window.location.href = "archivos.html"; 
          }
    
        }
    }


    ajaxrequest.open("POST","php/pre_ser_registro_estudiantes.php", true);
    ajaxrequest.setRequestHeader("Content-Type", "application/json");
    ajaxrequest.send(jsonData);
}