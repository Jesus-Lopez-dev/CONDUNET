<?php
    include "../conexion.php";

    $id=$_POST['id'];
    
    $sql="DELETE from conectores WHERE id='".$id."'";
    mysqli_query($conexion,$sql);
    header('location:materiales_vista.php');
?>