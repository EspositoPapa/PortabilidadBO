<?php
//-----------------------------------------------------------------------------------
//por ahora el ingreso es de manera individual
//Se espera que se pueda lograr en loop (ciclos) y de informacion ingresada de fuera
$Cliente= ['Lucia Marta Gomez','Tota Lora','Mara Dona Campeones'];
$Pin= [123,456,789];
$ExternalCase= [11111,22222,33333];
$dni=[38128823,8456123,15000000];
$telefono=[1154136258,1164153978,1115114578];
$email=['luciamarta@gmail.com','totalora@gmail.com','maradona@campeones.com'];
$operador=['MOVISTAR','CLARO','MOVISTAR'];
$mercado=['POS','POS','PRE'];
$tlineas_portar =[1,1,1];
//LA INFORMACION QUE NOS DA NUESTRA BD
// Establecer la zona horaria de Argentina
date_default_timezone_set('America/Argentina/Buenos_Aires');
//Variables que se quedan

$Qgestiones = count($Cliente);
$hoy= date("d/m/Y");
$fechaactual = new DateTime();
$fechaactual->add(new DateInterval('P5D'));
$aleatorio= rand(1,5);
//$image = '../img/img_firmas/' . $dni[$i] . '.jpg';
$image_aleat = '../img/img_aleatorias/'. $aleatorio . '.jpg';
$fecha_porta= $fechaactual->format('d/m/Y');
//Esta fecha portin es la que iría como nombre ej: 'documentos_' . $fechaportin
$fechaportin = date("Ymdhis");
// mostrar info de php en el html <?php echo ? >
//**Recordá unir el ? con > de arriba asi se configura correctamente */
//Debo agregarle un For o un while (recordá que hay que colocar para que sea manual for($i=0;$i<=count(Qdegestiones;$i++)))
//Seria mejor usar un foreach

//----------------------------------------------------------------------
//RUTAS

?>