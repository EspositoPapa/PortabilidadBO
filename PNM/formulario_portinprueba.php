<?php
//class funtion Crearpdfmasivo {
    require_once('dompdf/autoload.inc.php');
    require_once 'fpdf\fpdf.php';
    require_once 'pdf_relleno.php';

    use Dompdf\Dompdf;

    for ($i = 0; $i < $Qgestiones; $i++) :  
        $image = '../img/img_firmas/' . $dni[$i] . '.jpg';



        $Cliente[$i] = $Cliente;
        $Pin[$i] = $Pin;
        $dni[$i] = $dni;
        $telefono[$i] = $telefono;
        $email[$i] = $email;
        $operador[$i] = $operador;
        $mercado[$i] = $mercado;
        $tlineas_portar[$i]= $tlineas_portar;
    
    //$ruta = 'formulario_portin.view.html';
    //$html = file_get_contents($ruta);
    //$dompdf = new Dompdf();
    //$dompdf->loadHtml($html);

    // Renderizar el contenido HTML en una imagen
    //$dompdf->render();
    //$imageData = $dompdf->output();

    //$pdf->AddPage();
    //$pdf->SetFont('Arial', '', 12);

    // Agregar la imagen al PDF
    //$pdf->Image('@' . $imageData, 10, 10, 190);

    //Ruta destino y nombre con el que se descargará
    //$filename = 'C:/PNM/' . $ExternalCase[$i] . '_portin.pdf';

    //Se muestra en la pantalla y se le pone nombre
    //$pdf->Output($filename, 'F');
    
        $pdf = new FPDF('P', 'mm', 'A4');
        $ruta = 'formulario_portin.view.html';
        //$html = file_get_contents($ruta);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($ruta);

        // Renderizar el contenido HTML en una imagen
        $dompdf->render();
        
        // Generar un nombre único para el archivo PDF temporal
        $tempPdfFile = uniqid() . '.jpg';

        // Guardar la salida de Dompdf en el archivo temporal
        file_put_contents($tempPdfFile, $dompdf->output());
        //Agrego y seteo la hoja
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        // Cargar la imagen desde el archivo PDF temporal
        $pdf->Image(($tempPdfFile), 10, 10, 190);

        // Eliminar el archivo PDF temporal
        unlink($tempPdfFile);

        //Ruta destino y nombre con el que se descargará
        $filename = 'C:/PNM/' . $ExternalCase[$i] . '_portin.pdf';

        //Se muestra en la pantalla y se le pone nombre
        $pdf->Output($filename, 'F');
    endfor;

    echo $Qgestiones .'Portines creados exitosamente'
//}

?>