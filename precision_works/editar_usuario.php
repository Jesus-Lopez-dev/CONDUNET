<?php
    include "../conexion.php";
    
    $id = $_POST['id'] ??"";
    $usuario = $_POST['usuario'] ??"";
    $password = $_POST['password'] ??"";
    $tipo = $_POST['tipo'] ??"";

    if(isset($_POST["usuario"]) && isset($_POST["password"])){
        $sql= $conexion -> query("UPDATE usuarios SET usuario='".$usuario."', password='".$password."', tipo='".$tipo."' WHERE id='".$id."'"); 
        
        if($sql = 1){
                header("location:usuarios_vista.php");
        }
    } else {
            echo "Por favor revise sus datos ingresados, Todos los campos son obligatorios";
    }
?>