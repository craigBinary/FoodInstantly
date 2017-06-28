<? 
include("db.php");

$id_restaurant=$_REQUEST["id_restaurant"];

mysql_query("update tbl_restaurant set estado_restaurant='inactivo' where id_restaurant='$id_restaurant'");
?>