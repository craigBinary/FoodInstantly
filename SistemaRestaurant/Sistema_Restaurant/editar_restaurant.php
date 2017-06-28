<?
include("db.php");
 $id_restaurant=$_REQUEST["id_restaurant"];
 $valor=$_REQUEST["valor"];
 //$token=$_REQUEST["token"];
  $consulta=mysql_query("select * from tbl_imagen_restaurant where id_restaurant='$id_restaurant'",$conexion);
 if($reg=mysql_fetch_object($consulta)){
	 $archivo=$reg->imagen_restaurant;
	 
	 
	 }
 
 
 $trae=mysql_query("select * from tbl_restaurant where id_restaurant='$id_restaurant'",$conexion);
  $total=mysql_num_rows($trae);
 if($row=mysql_fetch_object($trae)){
	
	 }
 ?>


<div class="modal-header" style="background-color:#FFF">
  <h3 class="modal-title" id="largeModalLabel" align="center">Editar Restaurant</h3>
</div>
<div class="modal-body" style="background-color:#FFF" >

<!-- Input -->
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box-body">    
     <? include("form_ingreso_restaurant.php");?>
    </div>
  </div>
</div></div>

<!-- /.modal-content --> 

<!-- /.modal-dialog --> 

<!--<div class="modal-footer" style="background-color:#FFF">
  <button type="button" class="btn btn-default" id="btn_guardar" name="btn_guardar" onclick="GuardarBeneficioOrgNoForm('<?=$ID;?>');">GUARDAR</button>
  <button type="button" class="btn btn-default"  data-dismiss="modal">CERRAR VENTANA</button>
</div>--> 

<script>
  $(function () {
    //Initialize Select2 Elements
  $(".select2").select2();
   //Date picker
  });
</script> 
<script src="js/encuesta.js"></script>