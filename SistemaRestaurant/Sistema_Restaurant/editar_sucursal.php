<? 

include("db.php");

  $token=$_REQUEST["token"];
 $id_sucursal=$_REQUEST["id_sucursal"];
 $id_restaurant=$_REQUEST["id_restaurant"];
  $direccion=$_REQUEST["direccion"];
 $nombre_calle=$_REQUEST["nombre_calle"];
$numero_direccion=$_REQUEST["numero_direccion"];
$hora_apertura=$_REQUEST["hora_apertura"];
$hora_cierre=$_REQUEST["hora_cierre"];

if($id_sucursal<>""){
	mysql_query("update tbl_sucursal set estado_sucursal='3' where id_sucursal='$id_sucursal'",$conexion);
	mysql_query("INSERT INTO `tbl_sucursal`(`id_sucursal`, `id_restaurant`, `id_comuna`, `nombre_calle`, `numero`, `token`, `estado_sucursal`,`hora_apertura`,`hora_cierre`) VALUES ('','$id_restaurant','$direccion','$nombre_calle','$numero_direccion','$token','2','$hora_apertura','$hora_cierre')",$conexion);
	}

?>