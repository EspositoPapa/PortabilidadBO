<?php
$plantilla=
'<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="estilo_portin.css">
    <title>Formulario Portin</title>
</head>
<body>
    
    <div id="logo_personal">
        <img src="../img/Logo_Personal.png">
    </div>

    <div class="container">
       
        <div class="formulario">    
            <div class="logo">

            </div>
            <div id="pnm_numero">
                <legend>FORMULARIO DE PORTABILIDAD NUMERICA MOVIL (PNM)</legend>
                <form>
                    <fieldset>
                        <div id="formu">
                        <div>
                        <p>
                            <label>Número de Solicitud PNM: 
                            __________<u><?php echo $ExternalCase[$i] ?></u>__________
                            </label>
                            
                        </p>
                        <p>
                            <label>Número PIN:</label>
                            __________<u><?php echo $Pin[$i] ?></u>__________
                        </p>
                        <p>
                            <label>Nro. Línea receptora PIN:</label>
                            ________<u><?php echo $telefono[$i] ?></u>________
                        </p>
                    </div>
                    <p>
                        <label style="padding-left: 183px;">Fecha:</label>
                        <?php echo $hoy ?>
                    </p>
                </div>
                    </fieldset>
                </form>
            </div>
            <!--div id="fecha">
                <form>
                    <fieldset>
                        <p>
                            <label>Fecha:</label>
                            <input type="datetime-local" name="fecha">
                        </p>
                    </fieldset>
                </form>
            <div-->
            <div id="suscriptor">
                <legend>DATOS DEL SUSCRIPTOR</leyend>
                    <form>
                        <fieldset>
                            <label>Persona Física</label>
                            <input type="checkbox" id="checkbox" name="checkbox" checked>
                            <label>Persona Jurídica</label>
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <label>Org. Gobierno</label>
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <p>
                                <label>Apellido y Nombre:</label>
                                __________<u><?php echo $Cliente[$i] ?></u>__________
                            </p>
                            <p>
                                <label>Razón social:</label>
                                ____<u>---</u>______________________
                            </p>
                            <p>
                                <label>Tipo documento:</label>
                                __________<u>DNI</u>_________
                                <label>Número de documento:</label>
                                __________<u><?php echo $dni[$i] ?></u>__________
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
                            ____<u>---</u>_______
                            <input type="checkbox" id="checkbox" name="checkbox">
                            <label>(No posee)</label>
                            <label>E-Mail de contacto:</label>
                            __<u><?php echo $email[$i] ?></u>__
                            <?php 
                                if ($email[$i]==""){
                                    echo "__________  <input type="checkbox" id="checkbox" name="checkbox" checked>
                                    <label>(No posee)</label>";
                                }else{
                                    echo "<input type="checkbox" id="checkbox" name="checkbox">
                                    <label>(No posee)</label>";
                                }
                            ?>
                            </p>
                        </fieldset>
                    </form>
            </div>

            <div id="servicio_actual">
                <legend>DATOS DEL SERVICIO ACTUAL</legend>
                <form>
                    <fieldset>
                            <p>
                                <label>Operador Donador:</label>
                                ________<u><?php echo $operador[$i] ?></u>________
                            </p>
                            <p>
                                <label>Modalidad de contratación:</label>&nbsp;&nbsp;
                                <label>Prepago</label>
                                <?php 
                                    if($mercado[$i]=="PRE"){
                                        echo "<input type="checkbox" id="checkbox" name="checkbox" checked>&nbsp;&nbsp;";
                                    }else{
                                        echo"<input type="checkbox" id="checkbox" name="checkbox">&nbsp;&nbsp;";
                                    }
                                ?>
                                <label>Factura</label>
                                <?php
                                    if($mercado[$i]==""){
                                        echo "<input type="checkbox" id="checkbox" name="checkbox" >&nbsp;&nbsp;";
                                    }else{
                                        if($mercado[$i]<>"PRE"){
                                        echo "<input type="checkbox" id="checkbox" name="checkbox" checked>&nbsp;&nbsp;";
                                        }else{
                                        echo"<input type="checkbox" id="checkbox" name="checkbox">&nbsp;&nbsp;";
                                        }
                                }
                                ?>
                            </p>

                            <p>
                            <!--ACA HACER MODIFICACIONES SI SE REALIZA MAS DE UNA LINEA O SE INCORPORA CORPORATIVO-->
                            <!-------------------------------------------------------------------------------------->
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                        <tr height="20">
                                            <td width="15" align="LEFT"><br></td>
                                            <td width="200" style="border:black solid 1px" align="CENTER" bgcolor="#FFFFFF"><b>
                                                    <font style="FONT-SIZE:11pt" face="Calibri" color="#000000">LINEA</font>
                                                </b></td>
                                            <td width="0" align="LEFT"> <br></td>
                                            <td width="200" style="border:black solid 1px" align="CENTER" bgcolor="#FFFFFF"><b>
                                                    <font style="FONT-SIZE:11pt" face="Calibri" color="#000000">NÚMERO</font>
                                                </b></td>
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
                                                <font style="FONT-SIZE:11pt" face="Calibri" color="#000000"><b><?php echo $tlineas_portar[$i] ?></b></font>
                                            </td>
                                            <td width="200" height="20" align="CENTER" Style="border: black solid 1px" bgcolor="#FFFFFF">
                                                <font style="FONT-SIZE:11pt" face="Calibri" color="#000000"><b><?php echo $telefono[$i] ?></b></font>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </p>
                            <p>
                                <label>Total de líneas a portar:</label>
                                ________<u><?php echo $tlineas_portar[$i] ?></u>________
                            </p>
                    </fieldset>
                </form>
            </div>

            <div id="servicio_contratar">
                <legend>DATOS DEL SERVICIO A CONTRATAR</legend>
                <form>
                    <fieldset>
                        <p>
                        <label>Operador Receptor:</label>
                        __________<u><?php echo "PERSONAL"?></u>__________
                        <br>
                        <label>Fecha estimada portación:</label>
                        <?php echo $fecha_porta ?>
                        </p>
                        

                    </fieldset>
                </form>
            </div>
                        
            <div id="info_digital">
                <legend>INFORMACIÓN DIGITALIZADA</legend>
                <form>
                    <fieldset>
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
                        <p>
                            <label>Apellido y Nombres / Apoderado:</label>
                            __________<u><?php echo $Cliente[$i] ?></u>__________
                        </p>

                        <p>
                            <labeL>Firma:</labeL>
                            <!--<img type="image" width="300" height="100">&nbsp;&nbsp;&nbsp;-->
                            <img width="300" height="100" src="
                                <?php 
                                //SI NO TIENE OPERADOR QUEDARÁ VACIO
                                if($operador[$i]==""){
                                    echo "";
                                }else{
                                    if($operador[$i]=="MOVISTAR"){
                                        echo $image;
                                    }else{
                                        echo $image_aleat;
                                    }
                                }
                            ?>" alt="">
                            <label>Fecha:</label>
                                __________<u><?php echo $hoy ?></u>__________
                        </p>

                    </fieldset>
                </form>
            </div>
        
        </div>
      <div class="footer">
    </div>
    <h5>Telecom Personal S.A. - 0800-444-0800 (Opción 1 y luego 2) - www.personal.com.ar</h5>
</body>
</html>'
?>