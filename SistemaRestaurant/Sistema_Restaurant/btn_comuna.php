  <? 
 $id_restaurant=$_REQUEST["id_restaurant"];

if($_REQUEST["token"]<>""){
 $token=$_REQUEST["token"];
}
  ?>
  
  
<button type="button" class="btn btn-success btn-xs" id="add_comuna" name="add_comuna" onclick="IngresarComuna('<? echo $token;?>','<? echo $id_restaurant;?>');"> <span class="fa fa-plus"></span>Agregar una Direcci&oacute;n </button>