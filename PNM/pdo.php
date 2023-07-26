<?php

try{
    $conexion = new PDO('mysql:host=localhost;dbname=dboportabilidad','root','');

    $resultados = $conexion ->query ('SELECT * FROM pnm');

}catch(PDOException $e){
    //Mostrar Error
    echo "Error:". $e->getMessage();
}


?>