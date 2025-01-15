<?php

$mysql_host =  'localhost';
$mysql_usuario =  'root';//nombre de usuario por defecto es root
$mysql_clave = '';
$mysql_BD = 'servicio';

$conexion = mysqli_connect($mysql_host, $mysql_usuario, $mysql_clave, $mysql_BD);//conexion con todos los parametros

if(mysqli_connect_errno()){ // funcion que solo se ejecuta si hay error
    echo "error con la conexion" . mysqli_connect_error();
}
?>