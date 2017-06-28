<? 
 include("db.php");


 $id_restaurant=$_REQUEST["id_restaurant"];

?>

<div class="form-group">
             <div class="col-md-6">
 <label for="exampleInputPassword1">Sucursal</label> 
                  
                  <select name="sucursal" id="sucursal"  class="form-control select2"  style="width:100%" onchange="ValidaFormularioVacio(this.value,'val_restaurant');" >
                  <option value="0" selected>seleccione</option>
                    <?php 
$buscar22="SELECT * FROM tbl_sucursal s,tbl_comuna c where s.id_restaurant='$id_restaurant' and c.id_comuna=s.id_comuna ";
$result55=mysql_query($buscar22,$conn);
while($reg=mysql_fetch_object($result55))
{
	
	?>
                    <option value="<?php echo $reg->id_sucursal; ?>"  ><?php echo $reg->nombre_calle." #".$reg->numero." ,".$reg->nombre_comuna; ?></option>
                    <?php
	//$NOM_CALLE=
}
				
				?>
                  </select>
                  </div></div>
                  
                             <script>
  $(function () {
    //Initialize Select2 Elements
  $(".select2").select2();
   //Date picker
  });
</script>