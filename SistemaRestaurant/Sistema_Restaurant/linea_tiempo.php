<?

include("db.php");
include("session.php");
include("../funcion.php");
date_default_timezone_set('America/Santiago');
 $hoy=date("Y-m-d");
 $hoyF=$hoy." 23:59:59";
 $bb = explode("-", $hoy);
 
$mes=$bb[1]-1;

if($mes==11 or $mes==10){
	$mes;
	}else{
		$mes="0".$mes;
		}

	 $fechaF= $bb[0]."-".$mes."-".$bb[2];
	$fechaFinal=$fechaF." 00:00:00";

$consulta=mysql_query("select distinct( date(fecha_calificacion)) as fecha from tbl_calificacion_restorant where id_restaurant='$id_restaurant' and fecha_calificacion BETWEEN '$fechaFinal' and '$hoyF'",$conexion);
$total=mysql_num_rows($consulta);

?>  

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
      <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
    </div>
        <h3 class="box-title"> Calificaciones de Usuarios</h3>
      </div>
      
      <div class="box-body">      
        <? if($total==0)
{
	echo "No se ha encontrado ning&uacute;na Calificaci&oacute;n ";
}
else
{?>
<ul class="timeline timeline-inverse">
   <?php              
 $sql="select distinct( date(fecha_calificacion)) as fecha from tbl_calificacion_restorant where id_restaurant='$id_restaurant' and fecha_calificacion BETWEEN '$fechaFinal' and '$hoyF' order by fecha desc";
$consulta=mysql_query($sql, $conexion) or die ("Problemas en buscar usuario del sistema1".mysql_error);
while($row=mysql_fetch_object($consulta))
{ 
	    ?>

    <li class="time-label">
        <span class="bg-red">
            <?

$fech=explode(" ",$row->fecha);
 $fechar=$fech[0];



  echo devuelveFechaMes($row->fecha);
						  

						  
						   ?>
        </span>
    </li>
    <?php      
	$sqlver="select * from tbl_calificacion_restorant c,tbl_cliente cl where id_restaurant='$id_restaurant'  and date(fecha_calificacion)='$fechar' and cl.id_cliente=c.id_cliente";
	$registro=mysql_query($sqlver, $conexion) or die ("   Problemas en buscar usuario del sistema2".mysql_error());
	while($reg=mysql_fetch_object($registro))
	{  
	$fech=explode(" ",$reg->fecha_calificacion);
 $hora=$fech[1];
	
				  
?>
    <li>
        <!-- timeline icon -->
        <i class="fa fa-commenting bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?php echo $hora; ?></span>

            <h3 class="timeline-header"><? echo $reg->nombre_cliente." ".$reg->apellido_cliente;?> Ha hecho una calificaci&oacute;n </h3>

            <div class="timeline-body">
              <? echo $reg->comentario;?> 
			  
            </div>

           
        </div>
    </li>
    <? 
	}
}
	  ?>

  
<li><i class="fa fa-clock-o bg-gray"></i></li>
</ul>
          </div></div></div></div><? } ?>    