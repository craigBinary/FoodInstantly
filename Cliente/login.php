<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Login</title>
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
</head>
<body>
	<!-- banner -->
	<div class="banner about-w3bnr">
		<!-- header -->
		<div class="header">
			<?php include('inc/navlogin.php'); ?>			
		</div>
		<div class="banner-text">
			<div class="container">
				<h2>Ahorra tiempo haciendo tu pedido <br> <span>llegar y comer!</span></h2>
			</div>
		</div>
	</div>
	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Login</li>
		</ol>
	</div>
	<div class="login-page about">
		<img class="login-w3img" src="images/img3.jpg" alt="">
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Inicio de sesión</h3>
			<div class="login-agileinfo">
				<form action="validaLogin.php" method="post">
				 	<?php
				 		if(isset($_GET['id_restaurant'])){
				 		echo '<input type="hidden" name="id_restaurant" value="'.$_GET['id_restaurant'].'">';
				 		}
				 	?>
					
					<input class="agile-ltext" type="text" name="username" placeholder="Usuario" required="">
					<input class="agile-ltext" type="password" name="password" placeholder="Contraseña" required=""> 
					
					<div class="wthreelogin-text">
						<ul>
							<li>
								
							</li>
							<li> </li>
						</ul>
						<div class="clearfix"> </div>
					</div>
					<input type="submit" value="ENTRAR" id="entrar" name="entrar">
				</form>
				<p>No tienes una cuenta? <a href="signup.php"> Registrarse aquí!</a></p>
			</div>
		</div>
	</div>	
		<div class="clearfix"> </div>
	<?php include('inc/footer.php'); ?>
	<!-- //footer -->
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) {
        		}
        	}
        });
    </script>
	<!-- //cart-js -->
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
