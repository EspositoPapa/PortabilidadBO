<?php

require_once('dompdf/autoload.inc.php');
require_once 'pdf_rellenobd.php';

$Qgestiones=-1;

use Dompdf\Dompdf;


foreach ($resultados as $i) {

        // Leer la imagen y codificarla en base64
        $imagen_data = base64_encode(file_get_contents('C:\xampp\htdocs\PortabilidadBO\PNM\img\Captura.jpg'));
    
        $imagen_logo = 'data:image/jpeg;base64,' . $imagen_data;
    // Obtener los datos correspondientes de las listas

    if ($i['email']==''){
       $infoemail= '<input type="checkbox" id="checkbox" name="checkbox" checked><label>(No posee)</label>';
    }else{
        $infoemail= '<input type="checkbox" id="checkbox" name="checkbox" >';
    };
        
    if($i['mercado']=='PRE'){
        $infoprepago='checked &nbsp;&nbsp';
    }else{
        $infoprepago='&nbsp;&nbsp';
    }
        
    if($i['mercado']<>'PRE'){
        $infofactura='checked';
    }else{
        $infofactura='&nbsp;&nbsp';    
    }
    // Reemplazar los valores en el HTML del formulario
    ob_clean();
    ob_start();
    $html = '
        <!DOCTYPE html>
            <html lang="es">
                <style>html{
                    size: A4;
                    width: 210mm;
                    height: 297mm;
                    margin: 0 auto;
                }
                body{
                    width: 90%;
                    height: 90%;
                    padding-left: 5%;
                    padding-right: 5%;
                }
                #cuadricula{
                    width: 93%;
                    margin: 10px;
                }
                legend{
                    margin-left: 10px;
                }
                </style>
        
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&family=Roboto:ital,wght@0,100;1,400&display=swap" rel="stylesheet">
                <title>Formulario Portin</title>
            </head>
        
            <header id="logo_personal">
                <style>
                    #logo_personal {
                    width: 150px;
                    height: 50px;
                    padding: 5px;
                    padding-left: 80%;
                }
                </style>
            </header>
        
            <body>
                <div>
                <img id="logo_personal" src='. $imagen_logo .'>
                </div>
        
                <div style="border: black 1px solid;width: 190mm ;height: 270mm;">  
                    <!--COMIENZO********************Sector info PNM**********************-->
                    <div id="cuadricula">
                        <p style="text-align: center;">FORMULARIO DE PORTABILIDAD NUMERICA MOVIL (PNM)</p>
                        <form>
                            <div <div style="margin-left: 5px;">
                                <label>Número de Solicitud PNM:__________<u>'.  $i['ExternalCase'] .' </u>__________ 
                                <label style="display: inline-block;">Fecha:</label>
                                    '. $hoy .'
                                <p>
                                    <label>Número PIN:</label>__________<u>'. $i['Pin'].'</u>__________
                                </p>
                                <p>
                                    <label>Nro. Línea receptora PIN:</label>________<u>'.$i['telefono'].' </u>________
                                </p>
                            </div>
                        </form>
                    </div>
                    <!--FIN********************Sector info PNM**********************-->
                    <!--COMIENZO********************Sector info SUSCRIPTOR*********************-->
                    <div id="cuadricula">
                        <legend>DATOS DEL SUSCRIPTOR</leyend>
                        <form>
                            <label>Persona Física</label>
                            <input type="checkbox" id="checkbox" name="checkbox" checked>
        
                            <label>Persona Jurídica</label>
                            <input type="checkbox" id="checkbox" name="checkbox">
        
                            <label>Org. Gobierno</label>
                            <input type="checkbox" id="checkbox" name="checkbox">
        
                            <p>
                                <label>Apellido y Nombre:</label>
                                __________<u>'. $i['Cliente'].'</u>__________
                            </p>
                            <p>
                                <label>Razón social:</label>
                                ____<u>---</u>______________________
                            </p>
                            <p>
                                <label>Tipo documento:</label>
                                __________<u>DNI</u>_________
        
                                <label>Número de documento:</label>
                                __________<u>'. $i['dni'].'</u>__________
                            </p>
                            <p>
                                <label>Apellido y Nombres / Apoderado:</label>
                                ____<u>---</u>______________________
                            </p>
                            <p>
                                <label>Tipo documento:</label>
                                ____<u>---</u>______________________
        
                                <label>Número de documento:</label>
                                ____<u>---</u>______________________
                            </p>
                            <p>
                                <label>Teléfono de contacto:</label>
                                ___<u>---</u>____
                                <input type="checkbox" id="checkbox" name="checkbox">
                                <label>(No posee)</label>
                                <label>E-Mail de contacto:</label>
                                __<u>'.$i['email'].'</u>__
                                '. $infoemail .'
                            </p>
                        </form>
                    </div>
                    <!--FIN********************Sector info SUSCRIPTOR*********************-->
                    <!--COMIENZO********************Sector info SERV.ACTUAL*********************-->
                    <div id="cuadricula">
                        <legend>DATOS DEL SERVICIO ACTUAL</legend>
                        <form>
                        <div style="margin-left: 5px;">
                            <p>
                                <label>Operador Donador:</label>
                                ________<u>'.$i['operador'] .'</u>________
                            </p>
                            <p>
                                <label>Modalidad de contratación:</label>&nbsp;&nbsp;
                                <label>Prepago</label>
                                <input type="checkbox" id="checkbox" name="checkbox"'. $infoprepago .'>
                                <label>Factura</label>
                                <input type="checkbox" id="checkbox" name="checkbox"'. $infofactura .'>
                            </p>
        
                            <p>
                         <!--ACA HACER MODIFICACIONES SI SE REALIZA MAS DE UNA LINEA O SE INCORPORA CORPORATIVO-->
                         <!-------------------------------------------------------------------------------------->
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr height="20">
                                    <td width="15" align="LEFT"><br></td>
                                    <td width="200" style="border:black solid 1px" align="CENTER" bgcolor="#FFFFFF">
                                        <b><font style="FONT-SIZE:11pt" face="Calibri" color="#000000">LINEA</font></b>
                                    </td>
                                    <td width="0" align="LEFT"> <br></td>
                                    <td width="200" style="border:black solid 1px" align="CENTER" bgcolor="#FFFFFF">
                                        <b><font style="FONT-SIZE:11pt" face="Calibri" color="#000000">NÚMERO</font></b>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                                       
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                <!--COMENZAR BUCLE POR AQUI, EL for($i=1;$i<=$tlineas_portar;$i++)-->
                                <!-------------------------------------------------------------------------------------->
                                <tr height="20">
                                    <td width="15" align="CENTER"> <br></td>
                                    <td width="200" align="CENTER" Style="border: black solid 1px" bgcolor="#FFFFFF">
                                       <font style="FONT-SIZE:11pt" face="Calibri" color="#000000"><b>'. $i['tlineas_portar'] .'</b></font>
                                    </td>
                                    <td width="200" height="20" align="CENTER" Style="border: black solid 1px" bgcolor="#FFFFFF">
                                        <font style="FONT-SIZE:11pt" face="Calibri" color="#000000"><b>'. $i['telefono'] .'</b></font>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                                    <p>
                                        <!---Aqui cantidad cuando necesitemos agregar varia lineas en misma cuenta-->
                                    </p>
                                    <p>
                                        <label>Total de líneas a portar:</label>
                                        ________<u>'. $i['tlineas_portar'] .'</u>________
                                    </p>
                        </div>            
                        </form>
                    </div>
                    <!--FIN********************Sector info SERV.ACTUAL*********************-->
                    <!--COMIENZO********************Sector info SERV.CONTRATAR*********************-->
                    <div id="cuadricula">
                        <legend>DATOS DEL SERVICIO A CONTRATAR</legend>
                        <form>
                            <div style="margin-left: 5px;">
                                <p>
                                    <label>Operador Receptor:</label>
                                    __________<u>"PERSONAL"</u>__________
                                    <br><br>
                                    <label>Fecha estimada portación:</label>
                                    '. $fecha_porta .'
                                </p>
                            </div>
                        </form>
                    </div>
                    <!--FIN********************Sector info SERV.CONTRATAR*********************-->
                    <!--COMIENZO********************Sector info DIGITALIZADA*********************-->         
                    <div id="cuadricula">
                        <legend >INFORMACIÓN DIGITALIZADA</legend>
                        <form>
                            <div style="margin-left: 10px;">
                                <label>Solicitud Firmada:</label>
                                <input type="checkbox" id="checkbox" name="checkbox" checked>&nbsp;&nbsp;
                                <label>Documento:</label>
                                <input type="checkbox" id="checkbox" name="checkbox" checked>&nbsp;&nbsp;
                                <label>Factura:</label>
                                <input type="checkbox" id="checkbox" name="checkbox">&nbsp;&nbsp;
                                <label>CUIT:</label>
                                <input type="checkbox" id="checkbox" name="checkbox">&nbsp;&nbsp;
                                <label>Poder:</label>
                                <input type="checkbox" id="checkbox" name="checkbox">&nbsp;&nbsp;
                                <label>Archivo Adjunto:</label>
                                <input type="checkbox" id="checkbox" name="checkbox" checked>&nbsp;&nbsp;
        
                                    <label>Apellido y Nombres / Apoderado:</label>
                                    __________<u>'. $i['Cliente'] . ' </u>__________<br> 
                                    <div>
                                    <label>Firma: </label><div style="margin-left: 10cm"><label> Fecha:__________<u>'.$hoy .'</u>__________</div> </labeL>
                                    
                                    </div>
                            </div>  
                        </form>
                    </div>
                    <!--FIN********************Sector info DIGITALIZADA*********************-->
                </div>
                <p style="text-align: center;margin:0;">Telecom Personal S.A. - 0800-444-0800 (Opción 1 y luego 2) - www.personal.com.ar</p>
            </body>
        </html>';
        // la firma
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
        $filename = 'C:/PNM/' . $i['ExternalCase'] . '_Portin.pdf';
        $output = $dompdf->output();
        file_put_contents($filename,$output);

        $Qgestiones= $Qgestiones+ 1;
    }
    //endfor;
    
    echo 'Creados '. $Qgestiones . ' portines exitosamente!!!'
?>