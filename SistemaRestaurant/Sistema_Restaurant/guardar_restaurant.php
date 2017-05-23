<? 
include("db.php");

$nombre_restaurant=$_REQUEST["nombre_restaurant"];
$direccion=$_REQUEST["direccion"];
$numero=$_REQUEST["numero"];
$email=$_REQUEST["email"];
$info=$_REQUEST["info"];

mysql_query ("INSERT INTO `tbl_restaurant`(`id_restaurant`, `nombre_restaurant`, `info_restaurant`, `id_comuna`, `num_contacto`, `email`, `calificacion`) VALUES ('','$nombre_restaurant','$info','$direccion','$numero','$email','')",$conexion);


?>