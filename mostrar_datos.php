<?php
    include 'conexion.php';

    $num_interno = $_GET['numero_interno'];

    $consulta = "SELECT imagen, numero_interno, nombre, cantidad, descripcion FROM conectores WHERE numero_interno = '$num_interno'";
    $resultado = $conexion -> query($consulta);

   while($fila = $resultado -> fetch_array()){
        $result["imagen"]=base64_encode($fila['imagen']);
        $result["numero_interno"]=$fila['numero_interno'];
        $result["nombre"]=$fila['nombre'];
        $result["cantidad"]=$fila['cantidad'];
        $result["descripcion"]=$fila['descripcion'];
        $usuario[] = $result;
    }
    
    echo json_encode($usuario);
    $resultado -> close();
?>