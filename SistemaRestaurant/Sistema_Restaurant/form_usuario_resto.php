
<? 
 include("db.php");
include("session.php");


?>

<div class="box-body">
            <div class="form-group">
             <div class="col-md-12">
              <label for="exampleInputPassword1"> Nombre de Usuario</label>
              <div id="val_nombre"></div>
              <input type="text" id="nombre_usuario_restaurant" name="nombre_usuario_restaurant" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_nombre');"  placeholder="Ingresar nombre de Usuario" >
            </div></div>         
            <div class="form-group">
            <div class="col-md-12">
            <label for="exampleInputPassword1"> Contrase&ntilde;a</label>
             <div id="val_pass"></div>
              <input type="password" id="clave" name="clave" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_pass'); " PlaceHolder="Contrase&ntilde;a" >
            </div></div>
            <div class="form-group">
            <div class="col-md-12">
            <label for="exampleInputPassword1">Vuelve a Escribir la Contrase&ntilde;a</label>
            <div id="val_pass"></div>
              <input type="password" id="clave_repite" name="clave_repite" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_pass');ValidaPass(this.value,clave.value) "  PlaceHolder="Repetir Contrase&ntilde;a">
            </div></div>
            
            
            
             <div class="form-group">
             <div class="col-md-12">
                  <label for="exampleInputPassword1">Restaurant</label> 
                  <div class="col-md-12"></div>
                  <div id="val_restaurant"></div>
                  <select name="restaurant" id="restaurant"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_restaurant');" >
                  <option value="0" selected>seleccione</option>
                    <?php 
$buscar22="SELECT * FROM tbl_restaurant where id_restaurant<>'0' and estado_restaurant='activo'";
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
             <div class="col-md-12">
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
                    <option value="<?php echo $reg->id_privilegio; ?>"  ><?php echo $reg->nombre_privilegio; ?></option>
                    <?php
	//$NOM_CALLE=
}
				
				?>
                  </select></div></div>
                  <div class="form-group">
             <div class="col-md-12">
                           <label for="exampleInputPassword1">Estado del Usuario</label> 
                   <div id="val_estado"></div>
                  <select name="estado" id="estado"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_estado');" >
                  <option value="0" >seleccione</option>
                  <option value="1" <? if($row->estado_usuario==1){echo "selected";}?>>ACTIVO</option>
                  <option value="2" <? if($row->estado_usuario==2){echo "selected";}?>>DESHABILITADO</option>
                    
                  </select>
         
            </div></div></div>
            
            
          <div class="box-footer" align="center">

            <button type="button" class="btn btn-primary" id="btn_enviar" name="btn_enviar" onclick="IngresarUsuarioResto('');"> <span class="fa fa-save"></span>GUARDAR </button>
        

            <button type="button" class="btn btn-primary" onclick="RefrescaListaUsuarioResto('');" > <span class="fa fa-ban"></span> CANCELAR </button>
          </div></div>
          </div>
           <script>
  $(function () {
    //Initialize Select2 Elements
  $(".select2").select2();
   //Date picker
  });
</script> 