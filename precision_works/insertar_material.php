<?php
    include "../conexion.php";

    $numero_interno = $_POST['numero_interno'];
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    if(isset($_POST["numero_interno"]) && isset($_POST["nombre"]) && isset($_POST["cantidad"]) && isset($_POST["descripcion"])){
        $revisar = getimagesize($_FILES["image"]["tmp_name"]);
        if($revisar != false){
            $image = $_FILES['image']['tmp_name'];
            $imgContenido = addslashes(file_get_contents($image));

        $insertar = $conexion->query("INSERT into conectores (imagen, numero_interno, nombre, cantidad, descripcion) VALUES ('$imgContenido', '$numero_interno', '$nombre', $cantidad, '$descripcion')");
        
        // Condicional para verificar la subida del fichero
        if($insertar){
            header("location:materiales_vista.php");
        }else{
            echo "Ha fallado la subida, reintente nuevamente.";
        } 
    // Si el usuario no selecciona ninguna imagen
    }else{
            echo "Por favor revise sus datos ingresados, Todos los campos son obligatorios";
    }
}
?>
