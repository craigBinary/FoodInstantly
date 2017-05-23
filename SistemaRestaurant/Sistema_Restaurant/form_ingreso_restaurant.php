 <? 
 include("db.php");
include("session.php");
 ?>
 
 <div class="box-body">
            <div class="form-group">
              <label for="exampleInputPassword1"> Nombre del Restaurant</label>
              <div id="val_nombre"></div>
              <input type="text" id="nombre_restaurant" name="nombre_restaurant" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_nombre');" onkeypress="return Letras(event)" >
            </div>
            <div class="row">
              <div class="col-md-8 ">
                <div class="form-group">
                  <label for="exampleInputPassword1">Direcci&oacute;n</label>
                  <div id="val_direccion"></div>
                  <select name="direccion" id="direccion"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_direccion');" >
                  <option value="0" selected>seleccione</option>
                    <?php 
$buscar22="SELECT * FROM tbl_comuna";
$result55=mysql_query($buscar22,$conn);
while($reg=mysql_fetch_object($result55))
{
	
	?>
                    <option value="<?php echo $reg->id_comuna; ?>" ><?php echo $reg->nombre_comuna; ?></option>
                    <?php
	//$NOM_CALLE=
}
				
				?>
                  </select>
                </div>
              </div></div>
              <div class="row">
              <div class="col-md-5 ">
                <div class="form-group">
                  <label for="exampleInputPassword1"> N&uacute;mero de Contacto</label>
                  <div id="val_numero"></div>
                  <input type="text" id="numero" name="numero" class="form-control"  onblur="ValidaFormularioVacio(this.value,'val_numero');" onkeypress="return acceptNum(event)" >
                </div>
              </div>
              <div class="col-md-5 ">
            <div class="form-group">
              <label for="exampleInputPassword1">Email de Contacto</label>
              <div id="danger_email"></div>
              <div class="input-group">
                <div class="input-group-addon"> <i class="fa fa-envelope-o"></i> </div>
                <input type="text" id="email" name="email" class="form-control" onblur="validarEmail(this.value,'email','danger_email'); ValidaFormularioVacio(this.value,'danger_email')" >
              </div>
            </div></div></div>
           <div class="form-group">
              <label for="exampleInputPassword1">Descripci&oacute;n o Informaci&oacute;n del Restaurant</label>
              <div id="val_info"></div>
              <textarea name="info" rows="5" class="form-control" id="info"  onblur="ValidaFormularioVacio(this.value,'val_info');"></textarea>
            </div>
                       
       
          </div>
          <div class="box-footer">
            <button type="button" class="btn btn-primary" id="btn_enviar" name="btn_enviar" onclick="IngresarRestaurant('');"> <span class="fa fa-save"></span>GUARDAR </button>
            <button type="button" class="btn btn-primary" onclick="cancelarIngreso();"> <span class="fa fa-ban"></span> Cancelar </button>
          </div>
          
          
          <script>
  $(function () {
    //Initialize Select2 Elements
  $(".select2").select2();
   //Date picker
  });
</script> 