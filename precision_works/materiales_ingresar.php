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
    <title>Alta de material</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Recursos bootstrap para el FRAMEWORK-->
    <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Librerias para input file-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/menu.css" th:href="@{/css/menu.css}">
   
    <!-- Nuestro js-->
    <script src="js/menu.js"></script>
    <script src="js/ingresar.js"></script>

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
                            <h1>Ingrese los datos del nuevo conector</h1>
                        </div>
                        <div class='card-body'>
                        <form action = "insertar_material.php" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                            <div class="form-row">
                                <label for="exampleFormControlFile1">Elija una imagen del conector... *</label>
                                <div class="col-md-10 mb-4">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image" required>
                                        <div class="invalid-feedback"> Seleccione una imagen</div>
                                        <label class="custom-file-label" for="customFile">Selecciona un archivo</label>
                                    </div>
                                </div>
                                <div class="col-md-10 mb-4">
                                    <label for="validationCustom01">Número externo *</label>
                                    <input type="text" class="form-control" name="numero_interno" placeholder="Ingrese el número externo del conector" required>
                                    <div class="invalid-feedback"> Ingrese un número externo </div>
                                </div>
                                <div class="col-md-10 mb-3">
                                    <label for="validationCustom01">Conector *</label>
                                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre del conector" required>
                                    <div class="invalid-feedback"> Ingrese el nombre del conector </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom01">Cantidad *</label>
                                    <input type="number" class="form-control" name="cantidad" placeholder="Ingrese la cantidad en stock" required>
                                    <div class="invalid-feedback"> Ingrese una cantidad </div>
                                </div>
                                <div class="col-md-7 mb-3">
                                    <label for="validationCustom01">Descripción *</label>
                                    <input type="text" class="form-control" name="descripcion" placeholder="Ingrese una breve descripción del conector" required>
                                    <div class="invalid-feedback"> Introduzca una breve descripción </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <button class="btn btn-primary" type="submit">Agregar nuevo conector</button>
                                    <label for="validationCustom01"><br>* Campos obligatorios</label>
                                </div>
                            </div>
                        </div>                  
                </div>
            </div>
        </div>
    </div>
</body>
</html>