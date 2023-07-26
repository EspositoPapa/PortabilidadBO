<?
include ("DESKTOP-60E22OL\Mauro\Portabilidad_BO");

$sentenciaSQL = $conexion -> prepare("SELECT * FROM dbo.PNM");
$sentenciaSQL-> execute();
$gestiones=$sentenciaSQL-> fetchaAll(PDO::FETCH_ASSOC);

?>