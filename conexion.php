<?php

//Datos de conexiónº
$servername = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'evento';

//Conexión
$conexion = mysqli_connect ($servername,$username,$password,$database);

//Comprobar

if(!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
else    
    echo "Conexión Exitosa"."<br>";
?>