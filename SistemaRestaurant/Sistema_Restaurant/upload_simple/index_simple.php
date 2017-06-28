<script src="upload_simple/script_simple.js"></script>
<form action="#" enctype="multipart/form-data" method="post">
  <span class="btn btn-success fileinput-button"> <i class="glyphicon glyphicon-plus"></i> <span>Agregar archivos...</span>
  <input type="file" name="file_upload_simple" id="file_upload_simple" >
  </span>
</form>     
<?

if($archivo<>"")
{
?>
<div id="CargaVistaArchivosSimple"><? include("vista_archivos_simple.php"); ?></div>
<? }else{ ?>
<div id="CargaVistaArchivosSimple"></div>
<? } ?>