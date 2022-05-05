<?php
    session_start();
    
    if(!isset($_SESSION['rol'])){
        header('location: index.php');
    } else {
        if($_SESSION['rol'] != "Administrador"){
            header('location: index.php'); 
        }
    }
    
    ob_start();
    $Object = new DateTime();  
    $fecha = $Object->format("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
    <style>
        footer {
                position: fixed; 
                bottom: -40px; 
                left: 0px; 
                right: 0px;
                height: 50px; 

                /** Extra personal styles **/
                color: black;
                text-align: right;
                font-size: 14px;
            }
    </style>
    <title>Document</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>
    <footer>
        <label>Fecha de generación de reporte: <?php echo $fecha; ?></label>
    </footer>
    <div style="text-align: center;">
        <img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/condunet.mx/precision_works/img/condunet.png"/><br>
    </div><br>
    
    <table class="table table-bordered table table-striped" id="table_id">
        <thead class="thead-dark">
            <tr class="text-center">
                <th style="font-size: 12px; vertical-align: middle;" scope="col">#</th>
                <th style="font-size: 12px; vertical-align: middle;" scope="col">Imagen</th>
                <th style="font-size: 12px; vertical-align: middle;" scope="col">Número Externo</th>
                <th style="font-size: 12px; vertical-align: middle;" scope="col">Número interno</th>
                <th style="font-size: 12px; vertical-align: middle;" scope="col">Stock</th>
                <th style="font-size: 12px; vertical-align: middle;" scope="col">Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include "../conexion.php";
                $sql ="SELECT * FROM conectores WHERE cantidad <= 10 ORDER BY cantidad";
                $resultado=mysqli_query($conexion,$sql);
                $cont = 0;

                if($resultado) {
                    while($filas=mysqli_fetch_assoc($resultado)){
            ?>
                              
                <tr class="text-center">
                    <td style="font-size: 12px; vertical-align: middle;"><?php echo $cont = $cont + 1; ?></td> 
                    <td style="font-size: 12px; vertical-align: middle;"><?php echo '<img height="50" width="50" src="data:image/jpeg;base64,'.base64_encode( $filas['imagen']).'"/>' ?></td>
                    <td style="font-size: 12px; vertical-align: middle;"><?php echo $filas['numero_interno'] ?></td>
                    <td style="font-size: 12px; vertical-align: middle;"><?php echo $filas['nombre'] ?></td>
                    <td style="font-size: 12px; vertical-align: middle;"><?php echo number_format($filas['cantidad']); ?></td>
                    <td style="font-size: 12px; vertical-align: middle;"><?php echo $filas['descripcion'] ?></td>
                </tr> 
            <?php 
                }
            } 
            ?>
        </tbody>
    </table> 
</body>
</html>

<?php
    $html = ob_get_clean();
    //echo $html

    require_once '../lib/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnabled'=> true));
    $dompdf->setOptions($options);
    
    $dompdf -> loadHTML($html);
    $dompdf -> setPaper('letter');
    //$dompdf -> setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("New_file.pdf", array("Attachment"=>false));


?>