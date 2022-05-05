<?php
    include "../conexion.php";

    $id=$_POST['id'];
    
    $sql="DELETE from movimientos WHERE id='".$id."'";
    mysqli_query($conexion,$sql);
    header('location:usuarios_movimientos.php');
?>