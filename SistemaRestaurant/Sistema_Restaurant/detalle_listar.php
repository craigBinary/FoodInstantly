 <? 
 include("db.php");
 include("session.php");
 include("../funcion.php");
 
 $page_curr=$_POST["page_curr"];
   
    if($page_curr=="")
    {
    $page_curr=1;   
    }

$registros_orga=$_REQUEST["registros_orga"];
if($registros_orga=="")
$registros_orga=10;

 $buscar_orga=$_REQUEST["buscar_orga"];
if($buscar_orga<>"")
{
	
$sqlbuscar_orga=" and nombre_plato like '%$buscar_orga%'  ";	
	
}
	

$ini=($page_curr-1)*$registros_orga;
 ?>
 <input name="pag_actual_oculto" id="pag_actual_oculto" type="hidden" value="<?php echo $page_curr; ?>" />
 <div class="table-responsive">

 <table  class="table table-bordered table-striped">
 <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nombre del Producto</th>
                  <th>$ Precio</th>
                  <th>Tipo</th>
                  <th>Estado</th>
                  <th>Tiempo de Preparaci&oacute;n</th>
                  <th></th>
                  <th></th>
                  
                </tr>
                </thead>
            <tbody>
                <? 
				$numero=1;
				$consulta=mysql_query("select * from tbl_plato p,tbl_tipo_plato tp,tbl_restaurant r where  p.id_tipo_plato=tp.id_tipo_plato and r.id_restaurant='$id_restaurant' and p.id_restaurant=r.id_restaurant and p.estado_plato<>'3' $sqlbuscar_orga order by nombre_plato asc limit $ini,$registros_orga 
				",$conexion);
				
$sqltotal=mysql_query("select * from tbl_plato p,tbl_tipo_plato tp,tbl_restaurant r where  p.id_tipo_plato=tp.id_tipo_plato and r.id_restaurant='$id_restaurant' and p.id_restaurant=r.id_restaurant and p.estado_plato<>'3' $sqlbuscar_orga order by nombre_plato asc",$conexion);
	$total_registros=mysql_num_rows($sqltotal);
	
			   while($row=mysql_fetch_object($consulta)){
					$estado=$row->estado_plato;	
					if($estado=='1'){
						$estado="DISPONIBLE";
						}else{
							$estado="DESHABILITADO";
							}	   
			?>
                <tr>
                  <td><? echo $numero++;?></td>
                  <td><? echo $row->nombre_plato;?></td>
                  <td><? echo "$ ".$row->precio;?></td>
                  <td><? echo $row->nombre_tipo;?></td>
                 <? if($estado=="DESHABILITADO"){?> <td><span class="badge bg-red"><? echo $estado;?></span></td><? }else{?>
                 <td><span class="badge bg-green"><? echo $estado;?></span></td><? }?>
                  <td><? echo $row->tiempo_preparacion;?></td>
                  <td align="center"><p data-placement="top" data-toggle="tooltip" >
                  <button class="btn btn-primary btn-xs"  onClick="EditarPlato('<? echo $row->id_plato;?>')" data-toggle="modal" ><span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Editar"></span> </button></p></td>
                  <td align="center"><p data-placement="top" data-toggle="tooltip" >
                  <button class="btn btn-danger btn-xs"  onClick="EliminaPlato('<? echo $row->id_plato?>')" data-toggle="modal" ><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="Eliminar"></span> </button></p></td>
                 
                </tr>
                <? }?>
              </table></div>
              </tbody>
              <div align="center"> <?
      
		  $paginas=ceil( $total_registros/$registros_orga);
echo paginate($registros_orga, $page_curr, $total_registros, $paginas, 'javascript:PaginaOrganizaciones(');
		 ?></div>
       
