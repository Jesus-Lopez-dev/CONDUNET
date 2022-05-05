<?php
    include 'conexion.php';

    $numero_interno = $_POST['numero_interno'];
    $cantidad = $_POST['cantidad'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $motivo = $_POST['motivo'];
    $accion = $_POST['accion'];

    $Object = new DateTime();  
    $fecha = $Object->format("Y-m-d");

    $consulta = $conexion -> query("UPDATE conectores set cantidad = if((cantidad - '$cantidad') >= 0, cantidad - '$cantidad', cantidad) WHERE numero_interno = '$numero_interno'");
        
    if(mysqli_affected_rows($conexion) != 0){
        $query = $conexion -> query("INSERT INTO movimientos (numero_interno, cantidad, nombre_usuario, motivo, accion, fecha) VALUES ('$numero_interno', $cantidad, '$nombre_usuario', '$motivo', '$accion', '$fecha')");
       
    }
    
    $resultado -> close();
    $result -> close();

?>