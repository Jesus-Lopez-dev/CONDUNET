<?php
    require '../lib/phpqrcode/qrlib.php';

    $contenido = $_POST['contenido'];

    $dir = 'QRCodes/';

    if(!file_exists($dir)){
        mkdir($dir);
    }

    $filename = $dir.''.$contenido.'.png';

    $tamanio = 10;
    $level = 'H';
    $framesize = 1;

    QRcode::png($contenido, $filename, $level, $tamanio, $framesize);

    echo '<img src="'.$filename.'" />';
?>