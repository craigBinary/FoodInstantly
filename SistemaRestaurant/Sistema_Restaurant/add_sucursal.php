<? 
include("db.php");


 // $token=$_REQUEST["token"];
 //$id_sucursal=$_REQUEST["id_sucursal"];
 $id_restaurant=$_REQUEST["id_restaurant"];

 
 $trae=mysql_query("select * from tbl_restaurant where id_restaurant='$id_restaurant' ",$conexion);
 while($row=mysql_fetch_object($trae)){
	 $direccion=$row->direccion;
	 $comuna=$row->id_comuna;
	 $numero=$row->numero_direccion;
	 $hora_apertura=$row->hora_apertura;
	 $hora_cierre=$row->hora_cierre;
	 }

?>
 <div class="row">
 <div id="val_sucursal"></div>
              <div class="col-md-5 ">
                <div class="form-group">
                  <label for="exampleInputPassword1">Comuna</label>
                  <div id="val_direccion"></div>
                  <select name="direccion" id="direccion"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_sucursal');" >
                  <option value="0" selected>- SELECCIONE -</option>
                    <?php 
$buscar22="SELECT * FROM tbl_comuna";
$result55=mysql_query($buscar22,$conn);
while($reg=mysql_fetch_object($result55))
{
	
	?>
                    <option value="<?php echo $reg->id_comuna; ?>" <? if($comuna==$reg->id_comuna){ echo "selected='selected'"; } ?>><?php echo $reg->nombre_comuna; ?></option>
                    <?php
	//$NOM_CALLE=
}
				
				?>
                  </select>
                </div>
              </div>
              <div class="col-md-5 ">
                <div class="form-group">
                <label for="exampleInputPassword1">Calle</label>
                <input type="text" id="nombre_calle" name="nombre_calle" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_sucursal');" value="<? echo $direccion;?>" placeholder="Ingresar nombre de la calle" onkeypress="return Letras(event)" >
                </div></div>
                  <div class="col-md-2 ">
                <div class="form-group">
                <label for="exampleInputPassword1">Numero</label>
                <input type="text" id="numero_direccion" name="numero_direccion" class="form-control" onblur="ValidaFormularioVacio(this.value,'val_sucursal');" placeholder="N&uacute;mero " onkeypress="return acceptNum(event)" value="<? echo $numero;?>" >
                </div></div>
                </div>
            <div class="row">
              <div class="col-md-5 ">
                <div class="form-group">
                <label for="exampleInputEmail1"><i>Hora de Apertura:</i></label>
                <div class="bootstrap-timepicker">
                  <div class="input-group" >
                    <input type="text" id="hora_apertura"  name="hora_apertura" onchange="ValidaFormularioVacio(this.value,'val_sucursal');" value="<?=substr($hora_apertura,0,-3);?>" class="form-control timepicker">
                    <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                  </div></div>
                
                
                </div>
                </div>
                 <div class="col-md-5 ">
                <div class="form-group">
               <label for="exampleInputEmail1"><i>Hora de Cierre:</i></label>
                <div class="bootstrap-timepicker">
                  <div class="input-group" >
                    <input type="text" id="hora_cierre"  name="hora_cierre" onchange="ValidaFormularioVacio(this.value,'val_sucursal');" value="<?=substr($hora_cierre,0,-3);?>" class="form-control timepicker">
                    <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                  </div></div>
                	</div>
                </div></div>
            
            
            
       
                     <script>
  $(function () {
    //Initialize Select2 Elements
  $(".select2").select2();
   //Date picker
    $("#hora_apertura").timepicker({
      showInputs: false,
	  timeFormat: 'HH:mm:ss',
	  minuteStep: 5,
	  showMeridian: false,
	
    }).on('changeTime.timepicker', function(e) {    
    var h= e.time.hours;
    var m= e.time.minutes;
    var mer= e.time.meridian;
    //convert hours into minutes
    m+=h*60;
	
	//alert(m);
    //8:00 = 10h*60m + 15m = 615 min
    if( m<480)
        $('#hora_apertura').timepicker('setTime', '07:00:00');
		
	
	if( m>1320)
        $('#hora_aperturahora_apertura').timepicker('setTime', '23:00:00');
		
				
  });
  
  
  
  
   $("#hora_cierre").timepicker({
      showInputs: false,
	  timeFormat: 'HH:mm:ss',
	  minuteStep: 5,
	  showMeridian: false,
	
    }).on('changeTime.timepicker', function(e) {    
    var h= e.time.hours;
    var m= e.time.minutes;
    var mer= e.time.meridian;
    //convert hours into minutes
    m+=h*60;
	
	//alert(m);
    //8:00 = 10h*60m + 15m = 615 min
    if( m<480)
        $('#hora_cierre').timepicker('setTime', '07:00:00');
		
	
	if( m>1320)
        $('#hora_cierre').timepicker('setTime', '23:00:00');
		
				
  });
   
  });
</script> 