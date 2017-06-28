<? 
include("db.php");
include("session.php");

 $id_plato=$_POST["id_plato"];
 $trae=mysql_query("select * from tbl_plato where id_plato='$id_plato'",$conexion);
 if($row=mysql_fetch_object($trae)){
	  $info=$row->descripcion_plato;
	 }
?>


<div class="modal-header" style="background-color:#FFF">
  <h3 class="modal-title" id="largeModalLabel">Descripci&oacute;n del Plato</h3>
</div>
<div class="modal-body" style="background-color:#FFF" >

<!-- Input -->
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box-body"> 
    <? if($info<>"") {?>
    <label><i>Descripci&oacute;n: </i></label>
    <div class="panel panel-primary"> 
    <div class="panel-body">
    <? echo $info;?>
    </div></div><? }else{
		echo "<strong>ESTE PLATO NO CUENTA CON UNA DESCRIPCI&Oacute;N</strong>"; }
		?>
    
    </div>
    </div></div>
    
    <div class="modal-footer" style="background-color:#FFF">
  <button type="button" class="btn btn-default"  data-dismiss="modal">CERRAR VENTANA</button>
</div>