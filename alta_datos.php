<?php
    include 'conexion.php';

    $numero_interno = $_POST['numero_interno'];
    $cantidad = $_POST['cantidad'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $motivo = $_POST['motivo'];
    $accion = $_POST['accion'];

    $Object = new DateTime();  
    $fecha = $Object->format("Y-m-d");

    $consulta = "UPDATE conectores set cantidad = cantidad + '$cantidad' WHERE numero_interno = '$numero_interno'";
    $resultado = $conexion -> query($consulta);

    $consulta2 = "INSERT INTO movimientos (numero_interno, cantidad, nombre_usuario, motivo, accion, fecha) VALUES ('$numero_interno', $cantidad, '$nombre_usuario', '$motivo', '$accion', '$fecha')";
    $resultado2 = $conexion -> query($consulta2);

    $resultado -> close();
    $resultado2 -> close();


?>