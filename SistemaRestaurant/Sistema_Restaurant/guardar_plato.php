<? 

include("db.php");
include("session.php");

$oculto_simple=$_REQUEST["oculto_simple"];
$nombre_archivo=$_REQUEST["nombre_archivo"];
$nombre_plato=$_REQUEST["nombre_plato"];
$precio=$_REQUEST["precio"];
$tipo=$_REQUEST["tipo"];
$info=$_REQUEST["info"];
$tiempo=$_REQUEST["tiempo"];
$estado=$_REQUEST["estado"];
echo $_FILES["file"]["name"];

$tiempo_final=$tiempo." min";

$guarda=mysql_query("INSERT INTO `tbl_plato`(`id_plato`, `id_restaurant`, `nombre_plato`, `id_tipo_plato`, `estado_plato`, `precio`, `descripcion_plato`, `tiempo_preparacion`) VALUES ('','$id_restaurant','$nombre_plato','$tipo','$estado','$precio','$info','$tiempo_final')",$conexion);
$id_plato=mysql_insert_id($conexion);

if($oculto_simple<>""){
$guarda2=mysql_query("INSERT INTO `tbl_imagen_plato`(`id_imagen_plato`, `id_plato`, `nombre_imagen_plato`, `imagen_plato`) VALUES ('','$id_plato','$nombre_archivo','$oculto_simple')",$conexion);
}
?>