<? 
include("db.php");
include("session.php");

$pregunta=mysql_query("select * from tbl_solicitud where id_restaurant='$id_restaurant' and estado_solicitud='pagado'",$conexion);
$total=mysql_num_rows($pregunta);
?>
<? if($total<>""){ ?>
<div class="table-responsive">

 <table  class="table table-bordered table-striped" >
 <thead>
                <tr >
                  <th>N &deg; Pedido</th>
                  <th  >Fecha Pedido</th>
                  <th  >Tiempo de Preparaci&oacute;n</th>
                  <th>Hora de entrega</th>                  
                </tr>
                </thead>
            <tbody>
                <? 

				
  $sqltotal=mysql_query("select DISTINCT(s.id_solicitud), s.fecha_hora, s.id_solicitud from tbl_detalle_solicitud ds, tbl_solicitud s, tbl_plato p where s.id_restaurant='$id_restaurant' and ds.id_solicitud=s.id_solicitud and p.id_plato=ds.id_plato  and s.estado_solicitud='pagado' order by fecha_hora asc",$conexion);
	//$total_registros=mysql_num_rows($sqltotal);
			   while($row=mysql_fetch_object($sqltotal)){
				   $id_sol=$row->id_solicitud;
				   
				   $consulta=mysql_query("select MAX(p.tiempo_preparacion)as tiempo_maximo from tbl_detalle_solicitud ds, tbl_solicitud s, tbl_plato p where s.id_restaurant='$id_restaurant' and ds.id_solicitud=s.id_solicitud and p.id_plato=ds.id_plato and s.estado_solicitud='pagado' and s.id_solicitud='$id_sol'",$conexion);
				   while($reg=mysql_fetch_object($consulta)){
					$tiempo_maximo=$reg->tiempo_maximo;   
				    $hora=$row->fecha_hora;
					$bb = explode("+", $hora);//separa la hora de las fechas
	                 $aa = explode(" ", $bb[0]);
	                  $hora2=$aa[1] ;//hora
                      $cc = explode(":", $hora2);//separa el signo :
	            	 $horaF=$cc[0] ;//hora
	                 $minuto=$cc[1] ;//minutos
	                 $minutoF=$minuto+$tiempo_maximo;//minutos de la hora de ingreso + minutos totales de los platos
					
						if($minutoF>60){
							$minutoF=$minutoF-60;
							 $horaFinal= $horaF+1 .':'.$minutoF;
							if($minutoF<10){
								$minutoF="0".$minutoF;
								 $horaFinal= $horaF+1 .':'.$minutoF;
								}							
							}else{
								 $horaFinal=$horaF.':'.$minutoF;
								}
				   
				  
			?>
                <tr>
                  <th style="cursor:pointer;text-align:center;"  onClick="VerSolicitud('<? echo $row->id_solicitud?>');"><? echo $row->id_solicitud;?></th>
                  <td  style="cursor:pointer" onClick="VerSolicitud('<? echo $row->id_solicitud?>');" align="center" ><? echo $row->fecha_hora;?></td>
                  <td align="center" style="cursor:pointer" onClick="VerSolicitud('<? echo $row->id_solicitud?>');"><? echo $tiempo_maximo." minutos";?></td>
                  <td align="center" style="cursor:pointer"  onClick="VerSolicitud('<? echo $row->id_solicitud?>');"><span class="badge bg-yellow"><? if($horaF>=12){  echo $horaFinal." PM";}else{echo $horaFinal." AM";} ?></span></td>                
                </tr>
                <? }}?>
              </table><? }else{
				  echo "<strong><h4>No Tiene Pedidos en Lista de Espera</h4></strong>";
			  }?>
              </tbody>