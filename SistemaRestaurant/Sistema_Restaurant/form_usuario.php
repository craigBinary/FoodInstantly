
<? 
 include("db.php");
include("session.php");



?>

<div class="box-body">
            <div class="form-group">
             <div class="col-md-10 col-md-offset-1">
              <label for="exampleInputPassword1"> Nombre de Usuario</label>
              <div id="val_nombre"></div>
              <input type="text" id="nombre_usuario_restaurant" name="nombre_usuario_restaurant" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_nombre');"  >
            </div></div>          
            <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
            <label for="exampleInputPassword1"> Contrase&ntilde;a</label>
             <div id="val_pass"></div>
              <input type="password" id="clave" name="clave" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_pass'); "  >
            </div></div>
            <div class="form-group">
            <div class="col-md-10 col-md-offset-1">
            <label for="exampleInputPassword1">Vuelve a Escribir la Contrase&ntilde;a</label>
            <div id="val_pass"></div>
              <input type="password" id="clave_repite" name="clave_repite" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_pass');ValidaPass(this.value,clave.value) "  >
            </div></div>

             <div class="form-group">
             <div class="col-md-10 col-md-offset-1">
                  <label for="exampleInputPassword1">Restaurant</label> 
                  <div id="val_restaurant"></div>
                  <select name="restaurant" id="restaurant"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_restaurant');" >
                  <option value="0" selected>seleccione</option>
                    <?php 
$buscar22="SELECT * FROM tbl_restaurant";
$result55=mysql_query($buscar22,$conn);
while($reg=mysql_fetch_object($result55))
{
	
	?>
                    <option value="<?php echo $reg->id_restaurant; ?>" ><?php echo $reg->nombre_restaurant; ?></option>
                    <?php
	//$NOM_CALLE=
}
				
				?>
                  </select></div></div>
                  
                  <div class="form-group">
             <div class="col-md-10 col-md-offset-1">
                           <label for="exampleInputPassword1">Tipo de Usuario</label> 
                   <div id="val_tipo"></div>
                  <select name="tipo" id="tipo"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_tipo');" >
                  <option value="0" selected>seleccione</option>
                    <?php 
$buscar22="SELECT * FROM tbl_privilegio where id_privilegio<>'3'";
$result55=mysql_query($buscar22,$conn);
while($reg=mysql_fetch_object($result55))
{
	
	?>
                    <option value="<?php echo $reg->id_privilegio; ?>" ><?php echo $reg->nombre_privilegio; ?></option>
                    <?php
	//$NOM_CALLE=
}
				
				?>
                  </select></div></div>
            
            </div>
          <div class="box-footer">
            <button type="button" class="btn btn-primary" id="btn_enviar" name="btn_enviar" onclick="IngresarUsuario('');"> <span class="fa fa-save"></span>GUARDAR </button>
           
          </div>
          
           <script>
  $(function () {
    //Initialize Select2 Elements
  $(".select2").select2();
   //Date picker
  });
</script> 