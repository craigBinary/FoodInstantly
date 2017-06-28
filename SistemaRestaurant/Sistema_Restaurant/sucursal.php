<? 
 include("db.php");
 //include("session.php");

 $token=$_REQUEST["token"];
 $id_restaurant=$_REQUEST["id_restaurant"];

$trae=mysql_query("select * from tbl_sucursal where token='$token'",$conexion);
 $total=mysql_num_rows($trae);
?>


<? if($total<>0){?>
<div class="col-md-10 col-md-offset-1">
<div class="table-responsive">
  <table   class="table table-striped table-hover table-bordered">
    <tr>
      <th ><i>DIRECCI&Oacute;N</i></th>
      <th ><i>HORA DE APERTURA</i></th>
      <th ><i>HORA DE CIERRE</i></th>
      <th width="80"> </th>
      <th width="80" > </th>
    </tr>
    <? 
	if($id_restaurant==""){
	$busca=mysql_query("select * from tbl_sucursal s,tbl_comuna c where s.token='$token' and s.id_restaurant='0' and (estado_sucursal='1' or estado_sucursal='2' or estado_sucursal='0') and c.id_comuna=s.id_comuna",$conexion);
	}else{	
		$busca=mysql_query("select * from tbl_sucursal s,tbl_comuna c where s.token='$token' and s.id_restaurant='$id_restaurant' and (estado_sucursal='1' or estado_sucursal='2' or estado_sucursal='0') and c.id_comuna=s.id_comuna",$conexion);
	}
		
	while($row=mysql_fetch_object($busca)){
		
	?>
     <tr>
      <td align="center" style="text-transform:uppercase"><strong><? echo $row->nombre_calle." # ".$row->numero.", ". $row->nombre_comuna;?></strong></td>
      <td align="center" style="text-transform:uppercase"><strong><? echo $row->hora_apertura;?></strong></td>
      <td align="center" style="text-transform:uppercase"><strong><? echo $row->hora_cierre;?></strong></td>
       <td align="center" ><i class="fa fa-edit" data-toggle="tooltip" title="Editar" style="cursor:pointer" onClick="IngresarComuna('<? echo $token;?>','<? echo $id_restaurant;?>','<? echo $row->id_sucursal;?>');"></i></td>
      <td align="center" ><i class="fa fa-trash" data-toggle="tooltip" title="Eliminar" style="cursor:pointer" onClick="EliminandoSucursal('<? echo $row->id_sucursal;?>','<? echo $token;?>','<? echo $id_restaurant;?>');"></i></td>
    </tr><? }?>
    </table></div></div>
    
    <? }?>