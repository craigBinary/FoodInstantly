<script src="upload_restaurant/script_restaurant.js"></script>
<form action="#" enctype="multipart/form-data" method="post">
  <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Agregar archivo...</span>
  <input type="file" name="file_upload_restaurant" id="file_upload_restaurant" >
  </span>
</form>     
<?

if($archivo<>"")
{
?>
<div id="CargaVistaArchivosRestaurant"><? include("vista_archivos_restaurant.php"); ?></div>
<? }else{ ?>
<div id="CargaVistaArchivosRestaurant"></div>
<? } ?>