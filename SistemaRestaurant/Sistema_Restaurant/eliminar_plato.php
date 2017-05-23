<? 

include("db.php");

 $id_plato=$_REQUEST["id_plato"];
 
$elimina=mysql_query("update tbl_plato set estado_plato='3' where id_plato='$id_plato'",$conexion);
?>