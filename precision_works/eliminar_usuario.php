<?php
    include "../conexion.php";

    $id=$_POST['id'];
    
    $sql="DELETE from usuarios WHERE id='".$id."'";
    mysqli_query($conexion,$sql);
    header('location:usuarios_vista.php');
?>