<?php
require_once 'pdf_rellenobd.php';
// Leer la imagen y codificarla en base64
    $imagen_data = base64_encode(file_get_contents('C:\xampp\htdocs\PortabilidadBO\PNM\img\Captura.jpg'));
    $imagen_data1= base64_encode(file_get_contents('C:\xampp\htdocs\PortabilidadBO\PNM\img\img_firmas\\'.$i['dni'].'.jpg'));
    $imagen_data2= base64_encode(file_get_contents('C:\xampp\htdocs\PortabilidadBO\PNM\img\img_aleatorias\\'.$aleatorio. '.jpg'));


    $imagen_logo = 'data:image/jpeg;base64,' . $imagen_data;
    $image_mov= 'data:image/jpeg;base64,' . $imagen_data1;
    $image_cla= 'data:image/jpeg;base64,' . $imagen_data2;

    if($i['operador']=='MOVISTAR'){
        $infooperador= '<img width="150" height="45" src='. $image_mov.'>';
    }else{
        $infooperador= '<img width="150" height="45" src='. $image_cla .'>';
    }
?>