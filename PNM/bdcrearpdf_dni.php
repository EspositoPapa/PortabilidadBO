<?php

    require_once('dompdf/autoload.inc.php');
    require_once 'pdf_rellenobd.php';

    use Dompdf\Dompdf;
    $Qgestiones=-1;

    //ver tema error por vacio

    foreach ($resultados as $i) {
   // Reemplazar los valores en el HTML del formulario
    ob_clean();
    ob_start();
    
    $imagen_data = base64_encode(file_get_contents('C:\xampp\htdocs\PortabilidadBO\PNM\img\Captura.jpg'));
    $imagen_frente= base64_encode(file_get_contents('C:\xampp\htdocs\PortabilidadBO\PNM\img\img_doc\\'.$i['dni'].'.jpg'));
    $imagen_dorso= base64_encode(file_get_contents('C:\xampp\htdocs\PortabilidadBO\PNM\img\img_doc\\'.$i['dni']. 'x.jpg'));

    $imagen_logo = 'data:image/jpeg;base64,' . $imagen_data;
    $imagen_f = 'data:image/jpeg;base64,' . $imagen_frente;
    $image_d= 'data:image/jpeg;base64,' . $imagen_dorso;

    //$im_frente ="<img width="200" height="90" src='.$imagen_f.'>";
    //$im_dorso = "<img width="200" height="90" src='.$imagen_d.'>";

        $dompdf = new Dompdf(['defaultPaperSize' => 'A4']);
    
        // Habilitar la carga de estilos CSS remotos
        $dompdf->getOptions()->setIsRemoteEnabled(true);
    
        // Aplicar el estilo CSS al documento
        $dompdf->setPaper('A4', 'portrait');
        //$dompdf->getOptions()->set('defaultFont', 'Arial');

        $html = '<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="text/css">
                <title>Formulario DNI</title>
            </head>
            <header>
                    <style>
                    #logo_personal {
                        width: 150px;
                        height: 50px;
                        padding-left: 80%;
                    }
                    @page {
                        size: A4;
                        margin: 0;
                    }
                    body {
                        margin: 0;
                    }            
                </style>
            </header>
            <body>
                <div>
                <img id="logo_personal" src='. $imagen_logo .'>
                </div>
                    <div class="formulario">
                        <style>
                            .formulario {
                                border-style: ridge;
                                border-color: black;
                                margin: 5px;
                                width: 18cm;
                                height: 28cm;
                                margin-left: 55px;
                              }
                        </style>
                        <h3 style="text-align: center;">DOCUMENTACIÓN: Es copia fiel del original</h3>
                        <style>
                            .imagendoc{
                                padding: 8%;
                            }
                        </style>
            <!--ACA IRÁ EL FRENTE DEL DOCUMENTO-->
                        <div class="imagendoc">
                            <img style="width: 16cm;height: 10cm;" src="'.$imagen_f.'">
                        </div>
            <!--ACA IRÁ EL DORSO DEL DOCUMENTO-->
                        <div class="imagendoc">
                            <img style="width: 16cm;height: 10cm;" src="'.$image_d.'">
                        </div>
                    </div>               
            </body>
        </html>';
        ob_end_clean();
        // Crear una instancia de Dompdf con tamaño de papel A4
        $dompdf = new Dompdf(['defaultPaperSize' => 'A4']);
    
        // Habilitar la carga de estilos CSS remotos
        $dompdf->getOptions()->setIsRemoteEnabled(true);
    
        // Aplicar el estilo CSS al documento
        $dompdf->setPaper('A4', 'portrait');

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el HTML en PDF
        $dompdf->render();
    
        // Ruta destino y nombre con el que se descargará
        $filename = 'C:/PNM/' . $i['ExternalCase'] . '_FotocopiaDocumento.pdf';
        // Ajustar el tamaño de la página al contenido HTML
        $output = $dompdf->output();
        file_put_contents($filename,$output);

        $Qgestiones= $Qgestiones+ 1;
    }
    //endfor;
    
    echo 'Creadas '. $Qgestiones . ' fotocopias de DNI exitosamente!!!'
?>