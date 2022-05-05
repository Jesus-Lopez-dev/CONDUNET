<?php
    include "../conexion.php";
    
    $id = $_POST['id'] ??"";
    $numero_interno = $_POST['numero_interno'] ??"";
    $nombre = $_POST['nombre'] ??"";
    $cantidad = $_POST['cantidad'] ??"";
    $descripcion = $_POST['descripcion'] ??"";

    if ($_FILES['image']['tmp_name'] != null) { 
        if(isset($_POST["numero_interno"]) && isset($_POST["nombre"]) && isset($_POST["cantidad"]) && isset($_POST["descripcion"])){
            $revisar = getimagesize($_FILES["image"]["tmp_name"]);
            if($revisar !== false){
                $image = $_FILES['image']['tmp_name'];
                $imgContenido = addslashes(file_get_contents($image));
            
                $sql= $conexion -> query("UPDATE conectores SET imagen='".$imgContenido."', numero_interno='".$numero_interno."', nombre='".$nombre."', cantidad=".$cantidad.", descripcion='".$descripcion."' WHERE id='".$id."'");
           
            if($sql=1){
                header("location:materiales_vista.php");
            }
        } else{
            echo "Por favor revise sus datos ingresados, Todos los campos son obligatorios";
            }
        }
    } else {
        if(isset($_POST["numero_interno"]) && isset($_POST["nombre"]) && isset($_POST["cantidad"]) && isset($_POST["descripcion"])){
            $sql= $conexion -> query("UPDATE conectores SET numero_interno='".$numero_interno."', nombre='".$nombre."', cantidad=".$cantidad.", descripcion='".$descripcion."' WHERE id='".$id."'");
           
            if($sql=1){
                header("location:materiales_vista.php");
            }
        } else{
            echo "Por favor revise sus datos ingresados, Todos los campos son obligatorios";
            }
        }
?>