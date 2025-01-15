var resultado = document.getElementById("info");

function ajaxpost() {
  var ajaxrequest;

  if (window.XMLHttpRequest) {
    ajaxrequest = new XMLHttpRequest(); //navegadores nuevos
  } else {
    ajaxrequest = new ActiveXObject("Microsoft.XMLHTTP"); //navegadores antiguos
  }

  var nom = document.getElementById("nombre").value;
  var ced = document.getElementById("cedula").value;
  var ema = document.getElementById("email").value;
  var con = document.getElementById("contrasena").value;
  var con2 = document.getElementById("contrasena2").value;

  //var infousuario = "nombre=" + nom + "&cedula=" + ced + "&email=" +ema + "&contrasena=" + con +"&contrasena2=" + con2; 

  var data = {
    nombre:nom,
    cedula:ced,
    email:ema,
    contrasena:con,
    contrasena2:con2

  };

  var jsonData = JSON.stringify(data);


  ajaxrequest.onreadystatechange = function() {
    if (ajaxrequest.readyState == 4 && ajaxrequest.status == 200) {
      var mensaje = ajaxrequest.responseText;
      resultado.innerHTML = mensaje;

      if (mensaje.includes("gracias")) {
        // Si el mensaje incluye "gracias", significa que no hubo errores
        window.location.href = "index.html"; // Redirecciona a la página index.html
      }

    }
  }

  //ajaxrequest.open("GET", "php/servidor.php?" + infousuario, true);//variable nombre almacena el nombre ingresado
  //ajaxrequest.send();
  ajaxrequest.open("POST","php/servidor.php", true);
  ajaxrequest.setRequestHeader("Content-Type", "application/json");
  ajaxrequest.send(jsonData);

}