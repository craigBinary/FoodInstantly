<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="es">
<head>
<title>Registro</title>
<link rel="shortcut icon" type="image/x-icon" href="img/ico.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<!-- //Custom Theme files -->
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- //js -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
<!-- //web-fonts -->
<script>

function validar(){
if (document.getElementById('checkbox').checked){
  var p1 = document.getElementById("password").value;
  var p2 = document.getElementById("password2").value;

    if (p1.length == 0 || p2.length == 0 ) {
    alert("Primero debes ingresar la contraseña y confirmar");
    return false;
  }
  if (p1 != p2) {
  alert("La contraseña debe coincidir");
  return false;

  }
return true;
}
else
{
alert("Para registrarte debes aceptar los términos");
return false;
}
}

function justNumbers(e){
	var key = window.Event ? e.which : e.keyCode
	return ((key >= 48 && key <= 57) || (key==8)) 
}
</script>
</head>
<body>
	<!-- banner -->
	<div class="banner about-w3bnr">
		<!-- header -->
    <?php include('inc/navlogin.php'); ?>
    
		<!-- //header-end -->
		<!-- banner-text -->
		<div class="banner-text">
			<div class="container">
				<h2>Ahorra tiempo haciendo tu pedido <br> <span>llegar y comer!</span></h2>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Registro</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- sign up-page -->
	<div class="login-page about">
		<img class="login-w3img" src="images/img3.jpg" alt="">
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Registrate para obtener una cuenta</h3>
			<div class="login-agileinfo">
				<form action="validaRegistro.php" method="post" name="form" onsubmit="return validar(document.form);">
				  <input class="agile-ltext" type="text" name="nombre" placeholder="Nombre" required="">
		          <input class="agile-ltext" type="text" name="apellido" placeholder="Apellido" required="">
		          <input class="agile-ltext" type="text" name="celular" onkeypress="return justNumbers(event);" placeholder="Celular" required="">
		          <input class="agile-ltext" type="email" name="mail" placeholder="Correo electrónico" required="">
		          <input class="agile-ltext" type="text" name="Username" placeholder="Nombre de usuario" required="">		          
				  <input class="agile-ltext" type="password" name="password" id="password" placeholder="Contraseña" required="">
          		  <input class="agile-ltext" type="password" name="password2" id="password2" placeholder="Confirme contraseña" required="">
					<div class="wthreelogin-text">
						<ul>
							<li>
								<label class="checkbox"><input type="checkbox" name="checkbox" id="checkbox"><i></i>
									<span> Acepto los términos</span>
								</label>
							</li>
						</ul>
						<div class="clearfix"> </div>
					</div>
					<input type="submit" value="Registrar" name="registrar">
				</form>
				<p>Ya tienes una cuenta?  <a href="login.php"> Entra ahora!</a></p>
			</div>
		</div>
	</div>
	<!-- //sign up-page -->
	<!-- //subscribe -->
	<!-- footer -->

	<?php include('inc/footer.php'); ?>
	<!-- //footer -->
	<!-- cart-js -->
	
	<!-- start-smooth-scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();

			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>
