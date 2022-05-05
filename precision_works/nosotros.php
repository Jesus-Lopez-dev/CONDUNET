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
    <title>Nosotros</title>
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
                            <h1>CONDUNET S.A DE C.V</h1>
                        </div>
                        <div class='card-body'>
                            <p>CONDUNET es una empresa dedicada a fabricación de equipo eléctrico 
                                y electrónico y sus partes para vehículos automotores. Emplea alrededor 
                                de 251 y más personas. Se ubica en Boulevard Francisco Villa 
                                No. Exterior 1520, No. Interior 3 y 5, Colonia Santo Domingo de León, 
                                Guanajuato con número telefónico 477 763 6033.</p>
                            <div style="text-align:center;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3722.638648432183!2d-101.66878148575367!3d21.087089891161884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bbfcc1b44d603%3A0xe2245d0d638b86c7!2sCONDUNET!5e0!3m2!1ses-419!2smx!4v1648751673556!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                                <h3>Misión</h3>
                            <p>Somos una empresa que contribuye a la movilidad de las personas 
                                y productos, proporcionando la conectividad que nuestros clientes 
                                requieren, a través de la creatividad y pasión de nuestra gente en 
                                un ambiente seguro.</p>
                            <h3>Visión</h3>
                            <p>Ser una empresa que logre la excelencia en los productos mediante 
                                la mejora continua de nuestros procesos, y el desarrollo del personal, 
                                cumpliendo los estándares de calidad establecidos.</p>
                            <h3>Valores</h3>
                            <p>
                                <ul>
                                    <li>Trabajo en equipo</li>
                                    <li>Integridad</li>
                                    <li>Liderazgo</li>
                                    <li>Compromiso</li>
                                    <li>Respeto</li>
                                </ul>
                            </p>
                            <h3>Política de calidad</h3>
                            <p>En CONDUNET fabricamos productos eléctricos con el objetivo de obtener 
                                la satisfacción de nuestros clientes, enfocándonos en el cumplimiento 
                                de sus requisitos y mejorando continuamente la eficiencia de 
                                los procesos.</p>
                            <h3>Objetivo de calidad</h3>
                            <p>
                                <ul>
                                    <li>Cumplimiento de los requisitos técnico del cliente enfocado 
                                        al producto</li>
                                    <li>Productividad eficiente de la operación enfocado a 
                                        la producción.</li>
                                </ul>
                                <h3>Indicadores generales</h3>
                                <p>
                                    <ul>
                                        <li>Productividad</li>
                                        <li>Eficiencia de calidad</li>
                                        <li>Desarrollo de recurso humano</li>
                                    </ul>
                                <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>