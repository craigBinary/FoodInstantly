<? 
include("../db.php");
$pass_repite=$_REQUEST["pass_repite"];
$pass=$_REQUEST["pass"];

if($id_reunion=="")
{
	$yakuza=mysql_query("select * from asistentes where rut='$rut' and id_reunion='0' and token='$token'",$conexion);
	$total=mysql_num_rows($yakuza);
}
else
{
	$yakuza=mysql_query("select * from asistentes where rut='$rut' and id_reunion='$id_reunion' ",$conexion);
	$total=mysql_num_rows($yakuza);
}


	
$datos = array();      
$datos["total"]=$total;
print_r(json_encode($datos));

?>