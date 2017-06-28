

<? 
include("db.php");
include("session.php");
include("../funcion.php");



$pregunta=mysql_query("select * from tbl_solicitud where id_restaurant='$id_restaurant'",$conexion);
$total=mysql_num_rows($pregunta);

?>



<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
      <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i> </button>
    </div>
        <h3 class="box-title" > Lista de Solicitudes</h3>
      </div>
      <div class="box-body">
      <div id="CargarTablaPedido">
      <?
		  include("tabla_pedido.php");
		  ?></div>
      
</div></div></div></div></div>