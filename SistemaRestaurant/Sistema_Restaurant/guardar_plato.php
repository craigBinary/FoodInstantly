<? 

include("db.php");
include("session.php");

$nombre_plato=$_REQUEST["nombre_plato"];
$precio=$_REQUEST["precio"];
$tipo=$_REQUEST["tipo"];
$info=$_REQUEST["info"];
$tiempo=$_REQUEST["tiempo"];
$estado=$_REQUEST["estado"];

$tiempo_final=$tiempo." min";

$guarda=mysql_query("INSERT INTO `tbl_plato`(`id_plato`, `id_restaurant`, `nombre_plato`, `id_tipo_plato`, `estado_plato`, `precio`, `descripcion_plato`, `tiempo_preparacion`) VALUES ('','$id_restaurant','$nombre_plato','$tipo','$estado','$precio','$info','$tiempo_final')",$conexion);

?>