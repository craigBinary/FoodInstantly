<?
include("db.php");
 $id_plato=$_REQUEST["id_plato"];
 
 $trae=mysql_query("select * from tbl_plato where id_plato='$id_plato'",$conexion);
 if($row=mysql_fetch_object($trae)){
	 $tiempo_ant=$row->tiempo_preparacion;
	 }
	 $tiempo_ant_separa=explode(" ",$tiempo_ant);
	 $tiempo_final=$tiempo_ant_separa[0];
 ?>

<div class="modal-header" style="background-color:#FFF">
  <h3 class="modal-title" id="largeModalLabel">Editar Plato</h3>
</div>
<div class="modal-body" style="background-color:#FFF" >

<!-- Input -->
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box-body">    
      <div class="row">
       <div class="col-md-12">
    <div id="val_valida"></div>
    </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputPassword1">Nombre del Plato</label>
            <input type="text" id="nombre_plato" name="nombre_plato" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_valida');" value="<? echo $row->nombre_plato;?>" >
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputPassword1">Precio ($)</label>
            <input type="text" id="precio" name="precio" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_valida');" onkeypress="return acceptNum(event)" value="<? echo $row->precio;?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Tipo de Plato </label>
            <select name="tipo" id="tipo"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_valida');">
              <option value="0" selected>Seleccione</option>
               <?php 			  
				$buscar22="SELECT * from tbl_tipo_plato ";
				$result55=mysql_query($buscar22,$conn);
			while($reg=mysql_fetch_object($result55)){
				?>
    <option value="<?php echo $reg->id_tipo_plato; ?>" <? if($row->id_tipo_plato==$reg->id_tipo_plato){ echo "selected='selected'"; } ?>><?php echo $reg->nombre_tipo; ?></option>
              <?php
	//$NOM_CALLE=
}
				
				?>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-md-4">
      <div class="form-group">
      <label for="exampleInputPassword1">Tiempo de preparaci&oacute;n(en minutos)</label>
            <input type="text" id="tiempo" name="tiempo" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_valida');" onkeypress="return acceptNum(event)" value="<? echo $tiempo_final;?>" >

      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
      <label for="exampleInputEmail1">Estado del plato: </label>
            <select name="estado" id="estado"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_valida');">
              <option value="0" selected>Seleccione</option>
              <option value="1" <? if($row->estado_plato=='1'){echo "selected='selected'";}?>>Disponible</option>
              <option value="2" <? if($row->estado_plato=='2'){echo "selected='selected'";}?>>Deshabilitado</option>
              </select>
      </div>
      </div>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Descripci&oacute;n: </label>
        <textarea name="info" rows="4" class="form-control" id="info" placeholder="" onblur="ValidaFormularioVacio(this.value,'val_valida');"><? echo $row->descripcion;?></textarea>
      </div>
    </div>
  </div>
</div></div>
<div class="modal-footer" style="background-color:#FFF">
  <button type="button" class="btn btn-default" id="btn_guardar" name="btn_guardar" onclick="ActualizarPlato('<? echo $id_plato;?>');">GUARDAR</button>
  <button type="button" class="btn btn-default"  data-dismiss="modal">CERRAR VENTANA</button>
</div>
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