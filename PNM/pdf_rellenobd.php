<?php
try{
    $conexion = new PDO('mysql:host=localhost;dbname=dboportabilidad','root','');

    $resultados = $conexion ->query ('SELECT * FROM pnm');

}catch(PDOException $e){
    //Mostrar Error
    echo "Error:". $e->getMessage();
}

//LA INFORMACION QUE NOS DA NUESTRA BD
// Establecer la zona horaria de Argentina
date_default_timezone_set('America/Argentina/Buenos_Aires');
//Variables que se quedan

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