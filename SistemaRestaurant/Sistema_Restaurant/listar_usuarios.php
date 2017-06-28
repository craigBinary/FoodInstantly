<?php 

include("db.php");
include("session.php");



 session_start();
 //include("session.php"); 
/* $_SESSION["sistema_ses"]="0";*/
include("header.php");

?>

<input name="nuevo_oculto" id="nuevo_oculto" type="hidden" value="1" />
<div class="col-md-10 col-md-offset-1">
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> Usuarios</h3> 
        </div>
        <div class="box-body">
        <div class="row">
        <div class="col-md-4">
  <button type="button" class="btn btn-primary " onClick="AgregarUsuarioNuevo()"><span class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Agregar Usuario" ></span>Agregar Usuario</button>
</div></div>

        <div id="ListarUsuarios">
        <? include("detalle_usuario.php");?>
        </div>
        
</div></div></div>
        



<?php include("footer.php");?>

<!-- ./wrapper --> 

<script src="js/encuesta.js"></script>
<?php include("plugin.php");?>
</body>
</html>
<div class="modal fade" id="largeModal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="ventana_modal"> </div>
  </div>
</div>
