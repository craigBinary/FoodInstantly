

<? 
 include("db.php");
include("session.php");
 $oculto=$_REQUEST["nuevo_oculto"];
 $oculto_editar=$_REQUEST["oculto_editar"];
$id_usuario_editar=$_REQUEST["id_usuario"];

?>

<div class="modal-header" style="background-color:#FFF">
  <h3 class="modal-title" id="largeModalLabel" align="center">Perfil de Usuarios</h3>
</div>
<div class="modal-body" style="background-color:#FFF" >

<!-- Input -->
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="box-body"> 
    <div class="row">
       <div class="col-md-12">
       <? include("form_usuario.php");?>
	   </div></div></div></div></div></div>