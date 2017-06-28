<?

include("db.php");
include("session.php");
include("../funcion.php");

 $paginacion=$_POST["registros"];
 $usua_cierre=$_POST["usua_cierre"];

   $inicio_solicitud=$_POST["inicio_solicitud"];
  $termino_solicitud=$_POST["termino_solicitud"];
 //$inicio_cierre=$_POST["inicio_cierre"];
 //$termino_cierre=$_POST["termino_cierre"];

if($paginacion=="")
$paginacion=15;


$page_curr=$_POST["page_curr"];
	
	if($page_curr=="")
	{
	$page_curr=1;	
	}

$ini=($page_curr-1)*$paginacion;

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
 
 
  $buscar22="select * from tbl_solicitud s,tbl_cliente c,tbl_usuario_restaurant u where s.estado_solicitud='cerrado' and s.id_restaurant='$id_restaurant' and s.id_cliente=c.id_cliente  and u.nombre_usuario=s.usuario_cierre $sqlusua $sqlfecha_sol order by s.fecha_hora limit $ini,$paginacion ";
	
	 $total="select * from tbl_solicitud s,tbl_cliente c,tbl_usuario_restaurant u where s.estado_solicitud='cerrado' and s.id_restaurant='$id_restaurant' and s.id_cliente=c.id_cliente and u.nombre_usuario=s.usuario_cierre $sqlusua $sqlfecha_sol order by s.fecha_hora";
	$Resultadotot=mysql_query($total,$conexion);
	$total_registros=mysql_num_rows($Resultadotot);
  ?>
   <button type="button" onclick="location.href='excel.php?inicio_solicitud=<? echo $inicio_solicitud; ?>&termino_solicitud=<? echo $termino_solicitud; ?>&usua_cierre=<? echo $usua_cierre;?>'" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar a Excel</button>

 <div class="table-responsive" >
 <table  class="table table-bordered table-striped">
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


<div align="center">
<?php 


 $paginas=ceil( $total_registros/$paginacion);
  if($paginas>0)
echo paginate($paginacion, $page_curr, $total_registros, $paginas, 'javascript:HistorialBusqueda(');



?>
</div>