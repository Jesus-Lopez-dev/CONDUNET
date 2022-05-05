<?php
    include "../conexion.php";

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'];

    if(isset($_POST["usuario"]) && isset($_POST["password"])){

        $insertar = $conexion -> query("INSERT into usuarios (usuario, password, tipo) VALUES ('$usuario', '$password', '$tipo')");
        
        if($insertar = 1){
            header("location:usuarios_vista.php");
        } else {
            echo "Ha fallado la subida, reintente nuevamente.";
        } 
    }
?>