<?php 

include("db.php");
include("session.php");


 session_start();
 //include("session.php"); 
/* $_SESSION["sistema_ses"]="0";*/
include("header.php");

?>

        
        <!-- /.box-header --> 
        <!-- form start -->
        
        <div class="nav-tabs-custom" >
<ul class="nav nav-tabs" id="BotonesRestaurant">
         <li onClick="CargarPaginas('1');" class="active" > <a href="#tab_2" data-toggle="tab">Ingresar Restaurant</a></li>
          <li onClick="CargarPaginas('2');"  > <a href="#tab_2" data-toggle="tab">Habilitar/Deshabilitar un Restaurant</a></li>
         </ul>
          <div class="tab-content" id="VerSolicitudes">
        <div class="tab-pane active" id="form-ingreso">
        
        <? include("form_ingreso_restaurant.php");?>
        </div>
         </div>
      </div>






<?php include("footer.php");?>

<!-- ./wrapper --> 

<script src="js/encuesta.js"></script>
<script src="js/funciones_generales.js"></script>
<?php include("plugin.php");?>
</body>
</html>