<?
include("db.php");
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Restaurant | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <script src="js/encuesta.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<script>
function enviarfor()
{
	var usuario=document.getElementById("usuario").value;
	var clave=document.getElementById("clave").value;
	var restaurant=document.getElementById("restaurant").value;
	
	msg ="";
	ok1 = (usuario=="");
	ok2 = (clave=="");


	if (ok1) msg = msg + "* Debe ingresar el usuario \n";	
	if (ok2) msg = msg + "* Debe ingresar la contrase\u00f1a \n";	
	
	if (ok1 || ok2 ) 
	{	
		alert(msg);
		return false; 
	}
	
	document.form1.submit();
}

</script>  
  
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><img src="../img/restaurant.png"></a>  
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Bienvenidos</p>

    <form id="form1" name="form1" method="post" action="login.php" onSubmit="return enviarfor();" >
      <div class="form-group has-feedback">
        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="clave" name="clave" class="form-control" placeholder="Contrase&ntilde;a">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group ">
      <select name="restaurant" id="restaurant"   class="form-control select2" style="width:100%" >
              <option value="" selected="selected"> Seleccione Restaurant </option>
       <?php 			  
				$buscar22="SELECT * from tbl_restaurant ";
				$result55=mysql_query($buscar22,$conn);
			while($reg=mysql_fetch_object($result55)){
				?>
    <option value="<?php echo $reg->id_restaurant; ?>"><?php echo $reg->nombre_restaurant; ?></option>
              <?php
	//$NOM_CALLE=
}
				
				?>
            </select>
      </div>
        <!-- /.col -->  
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      
    </form>

   
    

   <!-- <a href="/restablecer.php">Olvid&eacute; mi Contrase&ntilde;a</a>--><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>


<script>
  $(function () {
    //Initialize Select2 Elements
  $(".select2").select2();
   //Date picker
  });
</script> 
</body>
</html>
