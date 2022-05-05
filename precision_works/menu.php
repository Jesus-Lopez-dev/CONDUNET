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
    <title>Menu</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Recursos bootstrap para el FRAMEWORK-->
    <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/menu.css" th:href="@{/css/menu.css}">
   
    <!-- Nuestro js-->
    <script src="js/menu.js"></script>

</head>
<body>
    <div class='dashboard'>
        <div class="dashboard-nav">
            <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
                <div class="col-12 condunet-img">
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
                            <h1>Bienvenido</h1>
                        </div>
                        <div class='card-body'>
                            <p>Su tipo de cuenta es: Administrador</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>