<? 

include("db.php");

 $id_usuario=$_REQUEST["id_usuario"];

$elimina=mysql_query("delete from tbl_usuario_restaurant where id_usuario='$id_usuario'",$conexion);

?>