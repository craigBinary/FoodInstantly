<?php

include("db.php");


$usuario=mysql_real_escape_string($_REQUEST["usuario"]);
 $clave=md5(mysql_real_escape_string($_REQUEST["clave"]));

 $restaurant=$_REQUEST["restaurant"];

if($restaurant==""){
	
 $trae_usuario2=mysql_query("select * from tbl_usuario_restaurant where nombre_usuario='$usuario' and password_usuario='$clave' and id_privilegio='3'",$conexion);

		if($row=mysql_fetch_array($trae_usuario2))
		{
			session_start();
			 $_SESSION["id_usuario"]=$row["id_usuario"];
			 $_SESSION["nombre_usuario"]=$row["nombre_usuario"];
			
		 	$_SESSION["id_privilegio"]=$row["id_privilegio"];
	  //$_SESSION["url"]=$row["url"];
			$row["id_privilegio"];
			
			//$_SESSION["rut_session"]=$rut;
					if( $_SESSION["id_usuario"]<>""){
							echo "<script>location.href='ingresar_restaurant.php'</script>";

					}else{
							echo "<script>location.href='index.php'</script>";
	
	}}


else
{
	echo "<script>alert('Usuario o clave incorrecta.');location.href='index.php'</script>";
}
	
	
	
	
	
	
	}else{

$trae_usuario=mysql_query("select * from tbl_usuario_restaurant where nombre_usuario='$usuario' and password_usuario='$clave'",$conexion);

		if($row=mysql_fetch_array($trae_usuario))
		{
			session_start();
			$_SESSION["id_usuario"]=$row["id_usuario"];
			$_SESSION["nombre_usuario"]=$row["nombre_usuario"];
			$_SESSION["id_restaurant"]=$row["id_restaurant"];
			$_SESSION["id_privilegio"]=$row["id_privilegio"];
			$_SESSION["url"]=$row["url"];
			
			
			//$_SESSION["rut_session"]=$rut;
					if( $_SESSION["id_privilegio"]=="1"){
							echo "<script>location.href='listar.php'</script>";
						
					}else if($_SESSION["id_privilegio"]=="2"){
							echo "<script>location.href='listar_pedidos.php'</script>";
	
	}else{
		echo "<script>location.href='index.php'</script>";
		}
	
	}


else
{
	echo "<script>alert('Usuario o clave incorrecta.');location.href='index.php'</script>";
}

	}
?>