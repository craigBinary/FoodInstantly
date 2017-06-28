<?php 

include("db.php");
include("session.php");


 session_start();
 //include("session.php"); 
/* $_SESSION["sistema_ses"]="0";*/
include("header.php");

?>

<div class="row">
<div class="col-md-6">  
<div id="InfoPedido">
       <? include("pedido.php");?>
</div>
</div>
  <div class="col-md-6" id="CargarDetallePedido">
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
