<? 
include("db.php");
include("../funcion.php");


$id_plato=$_REQUEST["id_plato"];
$nombre_plato=$_REQUEST["nombre_plato"];
$precio=$_REQUEST["precio"];
$tipo=$_REQUEST["tipo"];
$info=$_REQUEST["info"];
$tiempo=$_REQUEST["tiempo"];
$estado=$_REQUEST["estado"];

$tiempo_final=$tiempo." "."min";
$actualiza=mysql_query("UPDATE `tbl_plato` SET `nombre_plato`='$nombre_plato',`id_tipo_plato`='$tipo',`estado_plato`='$estado',`precio`='$precio',`descripcion_plato`='$info',`tiempo_preparacion`='$tiempo_final' WHERE id_plato='$id_plato'",$conexion);
?>