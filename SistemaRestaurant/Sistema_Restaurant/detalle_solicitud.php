
<? 
include("db.php");
include("session.php");
include("../funcion.php");

 $id_solicitud=$_POST["id_solicitud"];
 
 $trae=mysql_query("select c.celular,CONCAT(c.nombre_cliente,' ',c.apellido_cliente)as NombreCliente,c.mail,c.id_cliente,s.total_cuenta from tbl_solicitud s,tbl_cliente c where s.id_solicitud='$id_solicitud' and s.id_cliente=c.id_cliente",$conexion);
 while($row=mysql_fetch_object($trae)){
	 $id_cliente=$row->id_cliente;
	 $nombre_cliente=$row->NombreCliente; 
	 $contacto_cliente=$row->celular;
	 $email=$row->mail;
	 $total=$row->total_cuenta;
	 }
?>


<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
<div class="box-header with-border">

      <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
    </div>
    <h3 class="box-title"> Detalle Pedido N&deg; <? echo $id_solicitud;?></h3>
    </div>
      <div class="box-body">
      
      <div class="panel panel-success">
      <div class="panel-heading">INFORMACI&Oacute;N DEL CLIENTE</div>
        <div class="panel-body">
<div class="row">

 <div class="col-md-7">
 <div class="form-group">
          <label for="exampleInputEmail1"> Nombre del Cliente: </label>
          <? echo $nombre_cliente;?>
        </div></div>
        
         <div class="col-md-5">
         <div class="form-group">
        <label for="exampleInputEmail1"> Contacto: </label>
          <? echo $contacto_cliente;?>
        </div></div>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1"> E-mail: </label>
          <? echo $email;?>
        </div>
        
        </div></div>
  
         
      <div class="panel panel-primary">        
        <div class="panel-heading">DETALLE DEL PEDIDO N&deg; <? echo $id_solicitud;?></div>
        <div class="panel-body">
        <div class="table-responsive">

 <table  class="table table-bordered table-striped">
 <thead>
                <tr>
                  <th>CANTIDAD</th>
                  <th  >PLATO</th>
                  <th  >PREPARACI&Oacute;N</th>
                  <th>PRECIO</th>    
                             
                </tr>
                </thead>
            <tbody>
            <? 
			$consulta=mysql_query("select ds.cantidad,p.nombre_plato,p.precio,p.tiempo_preparacion, p.id_plato from tbl_detalle_solicitud ds,tbl_plato p,tbl_solicitud s where ds.id_solicitud='$id_solicitud' and ds.id_plato=p.id_plato and s.id_solicitud=ds.id_solicitud ",$conexion);
			while($reg=mysql_fetch_object($consulta)){
			
			?><tr>
                  <td align="center" ><? echo $reg->cantidad;?></td>
                  <td  onclick="VerDetallePlato('<? echo $reg->id_plato;?>')" style="cursor:pointer"><? echo $reg->nombre_plato;?></td>
                  <td><? echo $reg->tiempo_preparacion." minutos";?></td>
                  <td><? echo precio($reg->precio);?></td>   
                 <!--  <td><p data-placement="top" data-toggle="tooltip" >
                  <button class="btn btn-warning btn-xs"  onClick="EliminaPlato('<? echo $row->id_plato;?>')" data-toggle="modal" disabled><span class="glyphicon glyphicon-ok" data-toggle="tooltip" title="Eliminar"></span> </button></p></td>             -->
                </tr>
           <? }?>
           <tr>
                  <th align="center" >TOTAL</th>
                  <td >&nbsp;</td>
                  <td>&nbsp;</td>
                  <th><? echo precio($total); ?></th>                
                </tr>
              </table>
              </tbody></div>
        
        </div></div>
        <div align="center">
      <button onclick="CerrarSolicitud('<? echo $id_solicitud;?>','<? echo $id_cliente;?>','<? echo $id_restaurant;?>');" class="btn btn-clock btn-success btn-sm " type="button" id="btn_enviar"><i class="fa fa-check"></i>Entregar Pedido</button></div>

</div></div></div></div>


<div class="modal fade" id="largeModal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="ventana_modal"> </div>
  </div>
</div>
<div class="modal fade" id="smallModal"  role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="ventana_modal_chica"> </div>
  </div>
</div>
<div class="modal fade" id="Modal"  role="dialog">
  <div class="modal-dialog modal">
    <div class="modal-content" id="ventana_modal_default"> </div>
  </div>
</div>
