<?php 

include("db.php");
include("session.php");


 session_start();
 //include("session.php"); 
/* $_SESSION["sistema_ses"]="0";*/
include("header.php");

?>
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Ingresar Restaurant</h3>
        </div>
        <!-- /.box-header --> 
        <!-- form start -->
        <div id="form-ingreso">
        
        <? include("form_ingreso_restaurant.php");?>
        </div>
         
      </div>






<?php include("footer.php");?>

<!-- ./wrapper --> 

<script src="js/encuesta.js"></script>
<script src="js/funciones_generales.js"></script>
<?php include("plugin.php");?>
</body>
</html>