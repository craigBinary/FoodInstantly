	<?
	include("db.php");
include("session.php");
include("../funcion.php");
	
	 $id_solicitud=$_POST["id_solicitud"];
	  $id_cliente=$_POST["id_cliente"];
	  
	  	
	$trae=mysql_query("select * from tbl_cliente where id_cliente='$id_cliente'",$conexion);
	while($row=mysql_fetch_object($trae)){
		 $nombre=$row->nombre_cliente;
		 $mail=$row->mail;
		}	
/*mail(
     'diegoxpirinchox@gmail.com',
     'Works!',
     'An email has been generated from your localhost, congratulations!');*/
	   
	 $elimine=mysql_query("update tbl_solicitud set estado_solicitud='cerrado', fecha_cierre=now(),usuario_cierre='$nombre_usuario' where id_solicitud='$id_solicitud'",$conexion);


?>