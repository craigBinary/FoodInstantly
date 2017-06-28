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
<div id="InfoRestaurant">
       <? include("detalle_restaurant.php");?>
</div>
</div>
  <div class="col-md-6" id="CargarDetalleRestaurant">
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
