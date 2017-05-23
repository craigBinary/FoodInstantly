<? 
 include("db.php");
 include("session.php");
 
$nombre_usuario_restaurant=$_REQUEST["nombre_usuario_restaurant"];
$clave=$_REQUEST["clave"];
$restaurant=$_REQUEST["restaurant"];
$tipo=$_REQUEST["tipo"];

 $clave2=MD5($clave);


$inserta=mysql_query("INSERT INTO `tbl_usuario_restaurant`(`id_usuario`, `estado_usuario`, `nombre_usuario`, `password_usuario`, `id_restaurant`, `id_privilegio`) VALUES ('','1','$nombre_usuario_restaurant','$clave2','$restaurant','$tipo')",$conexion);
?>