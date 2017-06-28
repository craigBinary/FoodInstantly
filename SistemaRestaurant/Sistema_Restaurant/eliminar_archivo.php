<?

include("conexion2.php");
include("db.php");
$id=$_REQUEST["id"];
$token=$_REQUEST["token"];
$nombre_archivo=$_REQUEST["nombre_archivo"];
$mes=date("m");
$anyo=date("Y");

unlink("files/".$anyo."/".$mes."/".$token."/".$nombre_archivo);
rmdir("files/".$anyo."/".$mes."/".$token);

$elimina=mysql_query("DELETE FROM tbl_imagen_plato WHERE id_imagen_plato='$id'",$conexion);
   
?>