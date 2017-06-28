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
 $oculto_simple=$_REQUEST["oculto_simple"];
 $nombre_archivo=$_REQUEST["nombre_archivo"];
 
 $TraeImagen=mysql_query("select * from tbl_imagen_plato where id_plato='$id_plato'",$conexion);
 echo $total=mysql_num_rows($TraeImagen);

$tiempo_final=$tiempo." "."min";
$actualiza=mysql_query("UPDATE `tbl_plato` SET `nombre_plato`='$nombre_plato',`id_tipo_plato`='$tipo',`estado_plato`='$estado',`precio`='$precio',`descripcion_plato`='$info',`tiempo_preparacion`='$tiempo_final' WHERE id_plato='$id_plato'",$conexion);

if($oculto_simple<>""){
	
$guarda2=mysql_query("UPDATE tbl_imagen_plato SET  nombre_imagen_plato='$nombre_archivo', imagen_plato='$oculto_simple' where id_plato='$id_plato'",$conexion);
}

if($total==0){
	mysql_query("INSERT INTO `tbl_imagen_plato`(`id_imagen_plato`, `id_plato`, `nombre_imagen_plato`, `imagen_plato`) VALUES ('','$id_plato','$nombre_archivo','$oculto_simple')",$conexion);
	}
?>