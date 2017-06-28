<? 

 include("db.php");
 $id_sucursal=$_REQUEST["id_sucursal"];
  $token=$_REQUEST["token"];
   $id_restaurant=$_REQUEST["id_restaurant"];
 
 
 if($id_restaurant==""){
 mysql_query("delete from tbl_sucursal where id_sucursal='$id_sucursal'",$conexion);
 }else{
	 mysql_query("update tbl_sucursal set estado_sucursal='4' where token='$token' and id_sucursal='$id_sucursal'",$conexion);
	 }
 
?>