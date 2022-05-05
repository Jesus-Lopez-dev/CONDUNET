<?php
    include 'conexion.php';

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $query = $conexion -> prepare ("SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
    $query -> bind_param('ss', $usuario, $password);
    $query -> execute();

    $resultado = $query -> get_result();
    if ($fila = $resultado -> fetch_assoc()){
        echo json_encode($fila, JSON_UNESCAPED_UNICODE);
    }

    $query -> close();
    $conexion -> close();
?>