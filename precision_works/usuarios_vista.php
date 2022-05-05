<?php
    session_start();
    
    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    } else {
        if($_SESSION['rol'] != "Administrador"){
            header('location: index.php'); 
        }
    }
?>

<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>Usuarios</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Recursos bootstrap para el FRAMEWORK-->
    <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Librerias para select-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/menu.css" th:href="@{/css/menu.css}">
   
    <!-- Nuestro js-->
    <script src="js/menu.js"></script>

</head>
<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <div class="col-12 condunet-img-materiales">
                    <img src="img/condunet.png" th:src="@{img/condunet.png}"/>
                </div>
            </header>
            <nav class="dashboard-nav-list">
                <a href="menu.php" class="dashboard-nav-item"><i class="fas fa-home"></i>Inicio</a>
                <a href="nosotros.php" class="dashboard-nav-item"><i class="fas fa-building"></i> Nosotros </a>
                <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                        class="fas fa-tools"></i> Materiales </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="materiales_vista.php" class="dashboard-nav-dropdown-item">Vista general</a>
                        <a href="materiales_ingresar.php" class="dashboard-nav-dropdown-item">Ingresar material</a>
                </div>
                <div class='dashboard-nav-dropdown'><a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i
                        class="fas fa-users"></i> Usuarios </a>
                    <div class='dashboard-nav-dropdown-menu'>
                        <a href="usuarios_vista.php" class="dashboard-nav-dropdown-item">Ver</a>
                        <a href="usuarios_ingresar.php" class="dashboard-nav-dropdown-item">Ingresar nuevo</a>
                        <a href="usuarios_movimientos.php" class="dashboard-nav-dropdown-item">Movimientos</a>
                    </div>
                </div>
                <a href="generacion_QR.php" class="dashboard-nav-item"><i class="fas fa-solid fa-qrcode"></i>Generación de QR</a>
                <a href="reportes_vista.php" class="dashboard-nav-item"><i class="fas fa-file-invoice"></i> Generar reporte </a>
              <div class="nav-item-divider"></div>
              <a href="index.php?cerrar_sesion=1" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Cerrar sesión </a>
            </nav>
        </div>
        <div class='dashboard-app'>
            <header class='dashboard-toolbar'><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a></header>
            <div class='dashboard-content'>
                <div class='container'>
                    <div class='card'>
                        <div class='card-header'>
                            <h1>Listado de usuarios</h1>
                            <form action = "" method = "get">
                                <input type="text" name ="busqueda"></input>
                                <input type="submit" name ="enviar" value= "Buscar"></input>
                            </form>
                        </div>
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                  <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col">Tipo</th>
                                    <th colspan=2>Acción</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php

                                include "../conexion.php";
                                error_reporting(E_ERROR | E_PARSE);
                                $q = $_GET['busqueda']; 
                                $sql ="SELECT * FROM usuarios WHERE usuario LIKE '%".$q."%' OR tipo LIKE '%".$q."%'";

                                $resultado=mysqli_query($conexion,$sql);
                                while($filas=mysqli_fetch_assoc($resultado)){
                                    $i=0;
                            ?>
                              <tr class="text-center">
                                    <td style="vertical-align: middle;"><?php echo $cont = $cont + 1; ?></td> 
                                    <td style="vertical-align: middle;"><?php echo $filas['usuario'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $filas['password'] ?></td>
                                    <td style="vertical-align: middle;"><?php echo $filas['tipo'] ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#myModal<?php echo $filas['id'][$i] ?>" class="fas fa-pen"></a>
                                    </td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#myModal2<?php echo $filas['id'][$i] ?>" class="fas fa-trash-alt"></a>
                                    </td>
                              </tr>

                            <!-- Modal -->
                            <form action = "editar_usuario.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                            <div id="myModal<?php echo $filas['id'][$i] ?>" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Actualización de datos</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" name="id" value = "<?php echo $filas['id']?>">
                                    
                                    <label for="validationCustom01">Usuario:</label>
                                    <input type="text" class="form-control" name="usuario" placeholder="Ingrese el nombre de usuario" value = "<?php echo $filas['usuario']?>"  required>
                                    <br>
                                    <label for="validationCustom01">Contraseña:</label>
                                    <input type="text" class="form-control" name="password" placeholder="Ingrese una nueva contraseña" value = "<?php echo $filas['password']?>" required>
                                    <br>
                                    <label for="validationCustom01" >Tipo:</label>
                                    <select class="custom-select" name = "tipo">
                                        <option>Administrador</option>
                                        <option>Empleado</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    
                    <form action = "eliminar_usuario.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                    <div id="myModal2<?php echo $filas['id'][$i] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">     
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Advertencia!!!</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <label for="validationCustom01">¿Está de acuerdo en eliminar al usuario <?php echo $filas['usuario']?>?</label>
                                    <input type="hidden" class="form-control" name="id" value = "<?php echo $filas['id']?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>