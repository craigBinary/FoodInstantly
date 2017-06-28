<?

header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
header('Content-type: text/html; charset=utf-8' , true );
header("Content-Type: application/force-download");
header("Content-Disposition: attachment; filename=Listado_de_Inscritos_Farmacia_Municipal.xls");
header("Content-Transfer-Encoding: binary");
header("Cache-Control: private");

include("db.php");
include("session.php");
include("../funcion.php");

 $paginacion=$_REQUEST["registros"];
 $usua_cierre=$_REQUEST["usua_cierre"];

  $inicio_solicitud=$_REQUEST["inicio_solicitud"];
  $termino_solicitud=$_REQUEST["termino_solicitud"];
 //$inicio_cierre=$_POST["inicio_cierre"];
 //$termino_cierre=$_POST["termino_cierre"];



if($usua_cierre<>"")
{
	 $sqlusua=" and u.nombre_usuario like '%$usua_cierre%'"; 		
}

if($inicio_solicitud<>"" and $termino_solicitud<>""){
	 $inicio_solicitud=$inicio_solicitud." 00:00:00";
	$termino_solicitud=$termino_solicitud." 23:59:59";
 $sqlfecha_sol=" and s.fecha_hora between '$inicio_solicitud' and '$termino_solicitud'";
	}
 /*if($inicio_cierre<>"" and $termino_cierre<>""){
	 $inicio_cierre=$inicio_cierre." 00:00:00";
	$termino_cierre=$termino_cierre." 23:59:59";
	echo $sqlfecha_cierre=" and s.fecha_cierre between '$inicio_solicitud' and '$termino_solicitud'";
	}*/
 
 
  $buscar22="select * from tbl_solicitud s,tbl_cliente c,tbl_usuario_restaurant u where s.estado_solicitud='cerrado' and s.id_restaurant='$id_restaurant' and s.id_cliente=c.id_cliente  and u.nombre_usuario=s.usuario_cierre $sqlusua $sqlfecha_sol ";
	
	$Resultadotot=mysql_query($total,$conexion);
	$total_registros=mysql_num_rows($Resultadotot);
?>
<div class="table-responsive" >
 <table  border="1">
 <thead >
    <th width="3%" style="text-align:center"  >ID</th>
    <th width="15%" style="text-align:center"  >Nombre del Cliente</th>
    <th width="17%" style="text-align:center"  >Fecha de Ingreso</th>
    <th width="17%" style="text-align:center"  >Fecha de Cierre</th>
    <th width="15%" style="text-align:center"  >Usuario de Cierre</th>
  </tr>
  </thead>
            <tbody>
 <?
	  
	   $Resultado=mysql_query($buscar22,$conexion);
  while($row=mysql_fetch_array($Resultado)) 
    {
        ?>  <tr>
    <td align="center" ><?=  $row["id_solicitud"];  ?></td>
    <td align="center" ><?=  $row["nombre_cliente"]." ".$row["apellido_cliente"];  ?></td>
    <td align="center" ><?= mfecha($row["fecha_hora"]);  ?></td>
    <td align="center" ><?= mfecha( $row["fecha_cierre"]);  ?></td>
    <td align="center" ><?=  $row["nombre_usuario"];  ?></td>	  

  </tr>  
 <?
	}	
	  ?>
</table></div>
              </tbody>