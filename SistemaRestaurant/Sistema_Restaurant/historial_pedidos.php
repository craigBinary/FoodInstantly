<?php 

include("db.php");
include("session.php");

 //include("session.php"); 
/* $_SESSION["sistema_ses"]="0";*/
include("header.php");

?>


<? include("filtro_historial.php");?>
<div class="box box-primary">
<div class="box-header with-border">
        <h3 class="box-title">Historial de 	Pedidos</h3>
      </div>
  
      <div class="row"> 
                         <div class="col-md-2 form-group"> Mostrar
         
          <select name="registros" id="registros" onchange="HistorialBusqueda(1)" >
            <option value="10">10</option>
            <option value="15" selected="selected">15</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
          Registros</div> 
        
          
          </div>
   <div class="box-body" id="detalle_historial">
     <? include("listado_historial.php");?>
  </div>
  </div>



<div class="modal fade" id="largeModal"  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="ventana_modal">
    
    </div>
  </div>
</div>






<?php include("footer.php");?>

<!-- ./wrapper --> 

<script src="js/encuesta.js"></script>
<?php include("plugin.php");?>