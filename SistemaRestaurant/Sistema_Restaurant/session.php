
<?php
session_start();


if(isset($_SESSION['nombre_usuario']))
{ 
	 
	 $id_usuario=$_SESSION["id_usuario"];
	  $nombre_usuario=$_SESSION["nombre_usuario"]; 
	$id_privilegio=$_SESSION["id_privilegio"];
	//$sistema_ses=$_SESSION["sistema_ses"];
	 $id_restaurant=$_SESSION["id_restaurant"];
	//$menu_sis=$_SESSION["menu_sis"];	
	

}else{
echo "<script>location.href='index.php'</script>";
	}

//$url_foto="http://www.informaticarecoleta.cl/intranueva/fotos/";

/*if($nombre_usuario=="")
{
	echo "<script>top.location.href='/';</script>";
}*/
?>
	