<? 
 include("db.php");
 include("session.php");
 
$nombre_usuario_restaurant=$_REQUEST["nombre_usuario_restaurant"];
$clave=$_REQUEST["clave"];
$restaurant=$_REQUEST["restaurant"];
$tipo=$_REQUEST["tipo"];
$nuevo_oculto=$_REQUEST["nuevo_oculto"];
$oculto_editar=$_REQUEST["oculto_editar"];
$estado=$_REQUEST["estado"];
$id_usuario_editar=$_REQUEST["id_usuario_editar"];

 $clave2=MD5($clave);
 
 if($id_usuario_editar<>""){
	 $up=mysql_query("update tbl_usuario_restaurant set nombre_usuario='$nombre_usuario_restaurant', estado_usuario='$estado', id_privilegio='$tipo' where id_usuario='$id_usuario_editar'",$conexion);
	 }else{

if($nuevo_oculto==""){
$inserta=mysql_query("INSERT INTO `tbl_usuario_restaurant`(`id_usuario`, `estado_usuario`, `nombre_usuario`, `password_usuario`, `id_restaurant`, `id_privilegio`) VALUES ('','$estado','$nombre_usuario_restaurant','$clave2','$restaurant','$tipo')",$conexion);
 }else{
	 $inserta=mysql_query("INSERT INTO `tbl_usuario_restaurant`(`id_usuario`, `estado_usuario`, `nombre_usuario`, `password_usuario`, `id_restaurant`, `id_privilegio`) VALUES ('','1','$nombre_usuario_restaurant','$clave2','$id_restaurant','$tipo')",$conexion);
	 }

	 }
?>