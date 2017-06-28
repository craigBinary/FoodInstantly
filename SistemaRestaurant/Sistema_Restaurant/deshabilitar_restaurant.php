<? 

 include("db.php");
?>
<div class="row">
<div class="col-md-9">
<div class="form-group">
<div id="val_deshabilitar"></div>
    <label for="exampleInputPassword1">Habilitados</label>
                 
                  <select name="id_restaurant" id="id_restaurant"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_deshabilitar');" >
                  <option value="0" selected>- SELECCIONE -</option>
                    <?php 
$buscar22="SELECT * FROM tbl_restaurant where estado_restaurant='activo'";
$result55=mysql_query($buscar22,$conn);
while($reg=mysql_fetch_object($result55))
{
	
	?>
                    <option value="<?php echo $reg->id_restaurant; ?>" ><?php echo $reg->nombre_restaurant; ?></option>
                    <?php
	
}
				
				?>
                  </select>
                  </div>
                  </div>
                  
                  <div class="col-md-3">
                  <div class="form-group"><br>
                 <label>&nbsp;</label>
                  <button type="button" class="btn btn-danger" id="btn_enviar" name="btn_enviar" onclick="DeshabilitarRestaurant('');"> DESHABILITAR </button>
                  </div>
                  </div>
                  </div>
                  
                  <div class="row">
<div class="col-md-9">
<div class="form-group">
<div id="val_habilitar"></div>
    <label for="exampleInputPassword1">Deshabilitados</label>
                 
                  <select name="id_restaurant_des" id="id_restaurant_des"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_habilitar');" >
                  <option value="0" selected>- SELECCIONE -</option>
                    <?php 
$buscar22="SELECT * FROM tbl_restaurant where estado_restaurant='inactivo'";
$result55=mysql_query($buscar22,$conn);
while($reg=mysql_fetch_object($result55))
{
	
	?>
                    <option value="<?php echo $reg->id_restaurant; ?>" ><?php echo $reg->nombre_restaurant; ?></option>
                    <?php
	
}
				
				?>
                  </select>
                  </div>
                  </div>
                  
                  <div class="col-md-3">
                  <div class="form-group"><br>
                 <label>&nbsp;</label>
                  <button type="button" class="btn btn-success" id="btn_enviar" name="btn_enviar" onclick="HabilitarRestaurant('');"> HABILITAR </button>
                  </div>
                  </div>
                  </div>
                  
                  
                  
                  
                                   
                  
                  
                                   <script>
  $(function () {
    //Initialize Select2 Elements
  $(".select2").select2();
   });
   
   </script>