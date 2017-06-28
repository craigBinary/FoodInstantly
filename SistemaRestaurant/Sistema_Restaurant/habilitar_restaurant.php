<? 
include("db.php");

$id_restaurant_des=$_REQUEST["id_restaurant_des"];

mysql_query("update tbl_restaurant set estado_restaurant='activo' where id_restaurant='$id_restaurant_des'");
?>