<?php
    include "../conexion.php";
    
    session_start();

    if(isset($_GET['cerrar_sesion'])) {
        session_destroy();
        session_unset();

        header('location: index.php');
    }

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: menu.php');
            break;
            
            default:
        }
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        $usuario = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND password='".$password."'";
        $resultado=mysqli_query($conexion,$sql);

        $filas=mysqli_fetch_array($resultado);

        if($filas == true){
            $rol = $filas[3];
            $_SESSION['rol'] = $rol;
                
            switch($_SESSION['rol']){
                case 'Administrador':
                    header('location: menu.php');
                break;

                case 'Empleado':
                    echo 
                    "
                    <div class='alert alert-danger' role='alert'>
		            Usted no tiene suficientes privilegios. Por favor contacte al administrador :(
		            </div>";
                break;
                    
                default:
            }
        } else {
            echo 
                "
                <div class='alert alert-danger' role='alert'>
		        Usuario y/o contraseña incorrectas.
		        </div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <title>CONDUNET S.A DE C.V</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="css/index.css" th:href="@{/css/index.css}">

</head>
<body>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="img/user.png" th:src="@{img/user.png}"/>
                </div>
                <div class="col-12 condunet-img">
                    <img src="img/condunet.png" th:src="@{img/condunet.png}"/>
                </div>
                <form class="col-12" action="#" method="post">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="username" required/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required/>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>