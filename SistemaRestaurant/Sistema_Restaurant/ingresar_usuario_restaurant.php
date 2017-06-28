<? 

 include("db.php");
include("session.php");


 session_start();
 //include("session.php"); 
/* $_SESSION["sistema_ses"]="0";*/
include("header.php");


?>
<div class="col-md-10 col-md-offset-1">
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Ingresar Usuario</h3>
        </div>
        <div id="Usuario">
        <? include("form_usuario_resto.php");?>
        </div></div></div>
</div>
<?php include("footer.php");?>

<!-- ./wrapper --> 

<script src="js/encuesta.js"></script>
<script src="js/funciones_generales.js"></script>
<?php include("plugin.php");?>
</body>
</html>

 <script>
  $(function () {
    //Initialize Select2 Elements
  $(".select2").select2();
   //Date picker
  });
</script> 