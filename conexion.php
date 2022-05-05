<?php
$hostname = 'localhost';
$database = 'prueba1';
$username = 'root';
$password = '';

$conexion = new mysqli($hostname, $username, $password, $database);
if($conexion->connect_errno){
    echo "El sitio web esta experimentando problemas :(";
}
?>