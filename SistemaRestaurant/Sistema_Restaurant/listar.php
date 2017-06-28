<?php 

include("db.php");
include("session.php");


 session_start();
 //include("session.php"); 
/* $_SESSION["sistema_ses"]="0";*/
include("header.php");

?>

<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Mis Productos</h3>
    </div>
    <div class="row">
      <div class=" col-md-4">
        <div class="form-group">Mostrar
          <label for="select"></label>
          <select name="registros_orga" id="registros_orga" onchange="PaginaOrganizaciones(1)" >
            <option value="10" selected="selected">10</option>
            <option value="15" >15</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
          Registros </div>
      </div>
      <div class=" col-md-4">
        <div class="form-group">
        <p data-placement="top" data-toggle="tooltip">
  <button type="button" class="btn btn-primary " onClick="IngresarPlato()"><span class="glyphicon glyphicon-plus" data-toggle="tooltip" title="Agregar Plato" ></span>Agregar Plato de Comida</button>
</p>

        </div> </div>
      <div class=" col-md-4">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon"> <i class="fa fa-search"></i> </div>
            <input type="text" class="form-control pull-right" id="buscar_orga" onblur="false" placeholder="Buscar por Nombre del Plato o Tipo" onkeydown="if(event.keyCode == 13){  PaginaOrganizaciones(1); }">
          </div>
          <!-- /.input group --> 
        </div>
      </div>
    </div>
    <div class="box-body" id="ListarPlatos">
      <?php include("detalle_listar.php");?>
    </div>
  </div>
</div>
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
<div class="modal fade" id="smallModal"  role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="ventana_modal_chica"> </div>
  </div>
</div>
<div class="modal fade" id="Modal"  role="dialog">
  <div class="modal-dialog ">
    <div class="modal-content" id="ventana_modal_default"> </div>
  </div>
</div>
