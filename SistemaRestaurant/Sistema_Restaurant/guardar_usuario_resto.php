<? 
 include("db.php");
 include("session.php");
 
$nombre_usuario_restaurant=$_REQUEST["nombre_usuario_restaurant"];
$clave=$_REQUEST["clave"];
$restaurant=$_REQUEST["restaurant"];
$tipo=$_REQUEST["tipo"];
$estado=$_REQUEST["estado"];


 $clave2=MD5($clave);
 
mysql_query("INSERT INTO `tbl_usuario_restaurant`(`id_usuario`, `estado_usuario`, `nombre_usuario`, `password_usuario`, `id_restaurant`, `id_privilegio`) VALUES ('','$estado','$nombre_usuario_restaurant','$clave2','$restaurant','$tipo')",$conexion);
?>