<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="es">
<head>
<title>Home Food Instantly</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
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
	<div class="banner">
		<!-- header -->
		<div class="header">
			<?php include('inc/navlogin.php'); ?>
			<!-- //header-one -->
			<!-- navigation -->
			<?php include('inc/navheader.php'); ?>
			<!-- //navigation -->
		</div>
		<!-- //header-end -->
		<!-- banner-text -->
		<div class="banner-text">
			<div class="container">
				<h2>Ahorra tiempo haciendo tu pedido <br> <span>llegar y comer!</span></h2>
				<div class="agileits_search">
					<form action="productos.php" method="get">
					
					<select id="select" required="">
						<!-- <option value="">Seleccione</option> -->
					</select> 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<select id="agileinfo_search" required="">
						<option value="0" default selected> Seleccione Restaurant</option>
						</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="hidden" id="id_restaurant" name="id_restaurant" />
						<input type="submit" value="Buscar" id="buscar">
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->	
	<!-- order -->
	<div class="wthree-order">
		<img src="images/i2.jpg" class="w3order-img" alt=""/>
		<div class="container">
			<h3 class="w3ls-title">Como realizar un pedido en línea</h3>
			<p class="w3lsorder-text">ordene su plato favorito en 4 simples pasos.</p>
			<div class="order-agileinfo">
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
					<div class="order-w3text">
						<i class="fa fa-map" aria-hidden="true"></i>
						<h5>Seleccione restaurant</h5>
						<span>1</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
					<div class="order-w3text">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						<h5>Seleccione plato</h5>
						<span>2</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
					<div class="order-w3text">
						<i class="fa fa-credit-card" aria-hidden="true"></i>
						<h5>Pague el pedido</h5>
						<span>3</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids">
					<div class="order-w3text">
						<i class="fa fa-cutlery" aria-hidden="true"></i>
						<h5>Disfrute de su plato</h5>
						<span>4</span>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //order -->	
	<div class="clearfix"> </div>
	<!-- //dishes -->
	<!-- footer -->
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
	<!-- Owl-Carousel-JavaScript -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
		});
	</script>
	<!-- //Owl-Carousel-JavaScript -->
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
    <script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>
