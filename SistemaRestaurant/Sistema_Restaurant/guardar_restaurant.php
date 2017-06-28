<? 
include("db.php");
include("session.php");

$nombre_restaurant=$_REQUEST["nombre_restaurant"];
$direccion=$_REQUEST["direccion"];
$numero=$_REQUEST["numero"];
$email=$_REQUEST["email"];
$info=$_REQUEST["info"];
$valor=$_REQUEST["valor"];
$token=$_REQUEST["token"];
 $nombre_calle=$_REQUEST["nombre_calle"];
$numero_direccion=$_REQUEST["numero_direccion"];
$hora_apertura=$_REQUEST["hora_apertura"];
$hora_cierre=$_REQUEST["hora_cierre"];
echo $_FILES["file"]["name"];
$nombre_archivo=$_REQUEST["nombre_archivo"];
$oculto_simple=$_REQUEST["oculto_simple"];

if($valor==""){
$inserta=mysql_query ("insert into tbl_restaurant (`id_restaurant`, `nombre_restaurant`, `info_restaurant`, `id_comuna`, `num_contacto`, `email`, `calificacion`, `direccion`, `numero_direccion`, `mapa`,`estado_restaurant`,`hora_apertura`,`hora_cierre`) VALUES ('','$nombre_restaurant','$info','$direccion','$numero','$email','','$nombre_calle','$numero_direccion','','activo','$hora_apertura','$hora_cierre')",$conexion);
$id_restaurant=mysql_insert_id($conexion);

if($oculto_simple<>""){
$guarda2=mysql_query("INSERT INTO `tbl_imagen_restaurant`(`id_imagen_restaurant`, `nombre_imagen_restaurant`, `imagen_restaurant`,`id_restaurant`) VALUES ('','$nombre_archivo','$oculto_simple','$id_restaurant')",$conexion);
}
}else{
	 mysql_query("UPDATE `tbl_restaurant` SET `nombre_restaurant`='$nombre_restaurant',`info_restaurant`='$info',`num_contacto`='$numero',`email`='$email',`id_comuna`='$direccion',`numero_direccion`='$numero_direccion',`hora_apertura`='$hora_apertura',`hora_cierre`='$hora_cierre' WHERE id_restaurant='$id_restaurant'",$conexion);

	}
if($oculto_simple<>""){
$guarda2=mysql_query("INSERT INTO `tbl_imagen_restaurant`(`id_imagen_restaurant`, `nombre_imagen_restaurant`, `imagen_restaurant`,`id_restaurant`) VALUES ('','$nombre_archivo','$oculto_simple','$id_restaurant')",$conexion);
}
?>