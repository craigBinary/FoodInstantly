 <? 
 include("db.php");
include("session.php");


$busca=mysql_query("select * from tbl_sucursal s,tbl_restaurant r, tbl_comuna c where r.id_restaurant='$id_restaurant' and r.id_restaurant=s.id_restaurant and s.id_comuna=c.id_comuna",$conexion);

 ?>
 <input name="token" id="token" type="hidden" value="<?=$token;?>" />
 <div class="box-body">
            <div class="form-group">
              <label for="exampleInputPassword1"> Nombre del Restaurant</label>
              <div id="val_nombre"></div>
              <input type="text" id="nombre_restaurant" name="nombre_restaurant" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_nombre');" placeholder="Ingresar nombre del Restaurant" onkeypress="return Letras(event)" value="<? echo $row->nombre_restaurant;?>">
            </div>
           
              <div class="row">
              <div class="col-md-5 ">
                <div class="form-group">
                  <label for="exampleInputPassword1"> N&uacute;mero de Contacto</label>
                  <div id="val_numero"></div>
                  <input type="text" id="numero" name="numero" placeholder="Ingresar n&uacute;mero de tel&eacute;fono de Contacto" class="form-control"  onblur="ValidaFormularioVacio(this.value,'val_numero');" onkeypress="return acceptNum(event)" value="<? echo $row->num_contacto;?>">
                </div>
              </div>
              <div class="col-md-5 ">
            <div class="form-group">
              <label for="exampleInputPassword1">Email de Contacto</label>
              <div id="danger_email"></div>
              <div class="input-group">
                <div class="input-group-addon"> <i class="fa fa-envelope-o"></i> </div>
                <input type="text" id="email" name="email" class="form-control" onblur="validarEmail(this.value,'email','danger_email'); ValidaFormularioVacio(this.value,'danger_email')" placeholder="Ingresar e-mail de contacto del Restaurant" value="<? echo $row->email;?>">
              </div>
            </div></div></div>
           <div class="form-group">
              <label for="exampleInputPassword1">Descripci&oacute;n o Informaci&oacute;n del Restaurant</label>
              <div id="val_info"></div>
              <textarea name="info" rows="5" class="form-control" id="info"  onblur="ValidaFormularioVacio(this.value,'val_info');" placeholder="Descripci&oacute;n/Informaci&oacute;n del Restaurant..."><? echo $row->info_restaurant;?></textarea>
            </div>
              <div class="panel panel-success">

        <div class="panel-body">
           
            <div id="TablaSucursal">
            <?   include("add_sucursal.php");?>
           
            </div>
            </div></div>
                     <div class="form-group">
     <?   include("upload_restaurant/index_restaurant.php");?>
      
      </div>  
       
          </div>
          <div class="box-footer" align="center">
        
            <button type="button" class="btn btn-primary" id="btn_enviar" name="btn_enviar" onclick="IngresarRestaurant('<? echo $valor;?>');"> <span class="fa fa-save"></span>GUARDAR </button>
            <? if($id_restaurant<>""){?>
            <button type="button" class="btn btn-primary"  data-dismiss="modal"> <span class="fa fa-ban"></span> CANCELAR </button><? }?>
           
          </div>
          
          
          <script>
  $(function () {
    //Initialize Select2 Elements
  $(".select2").select2();
   //Date picker
  });
</script> 