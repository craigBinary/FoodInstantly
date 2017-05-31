<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
include 'inc/claseCliente.php';


?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Menú hazla corta</title>
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
			<!-- //header-one -->
			<!-- navigation -->
			<?php include('inc/navheader.php'); ?>
			<!-- //navigation -->
		</div>
		<!-- //header-end -->
		<!-- banner-text -->
		<div class="banner-text">
			<div class="container">
				<h2>Delicious food from the <br> <span>Best Chefs For you.</span></h2>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- breadcrumb -->
	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Menu</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- menu list -->
	<div class="wthree-menu">
		<img src="images/i2.jpg" class="w3order-img" alt=""/>
		<div class="container">
			<h3 class="w3ls-title">Tipos de comidas</h3>
			<p class="w3lsorder-text">Aquí puedes seleccionar la variedad de comidas</p>
			<div class="menu-agileinfo">
				<?php    
				$lista = new claseCliente();
				$lista->listarTipoPlato();
				?>
				<div class="clearfix"> </div>
			</div>
			<div class="w3spl-menu">
				<h3 class="w3ls-title">Seasonal  Menu</h3>
				<p class="w3lsorder-text">Here your Staple Food Varieties</p>
				<div class="menu-agileinfo">
					<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
						<a href="products.html">Fondue Savoyarde</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
						<a href="products.html">Garbure</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
						<a href="products.html">Poulet</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
						<a href="products.html">Cherry Clafouti</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
						<a href="products.html"> Spinach Soufflé</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
						<a href="products.html">Baeckeoffe</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
						<a href="products.html">Ratatouille</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-6 menu-w3lsgrids">
						<a href="products.html">Piperade</a>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<!-- //menu list -->
	<!-- add-products -->
	<div class="add-products">
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Today's Offers</h3>
			<div class="add-products-row">
				<div class="w3ls-add-grids">
					<a href="products.html">
						<h4>Get <span>10%<br>Cashback</span></h4>
						<h5>Special Offer Today Only</h5>
						<h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="w3ls-add-grids w3ls-add-grids-right">
					<a href="products.html">
						<h4>GET Upto<span><br>5% Offer</span></h4>
						<h5>On Order Lunch Today</h5>
						<h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //add-products -->
	
	<!-- footer -->
	<div class="footer agileits-w3layouts">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
					<h3>company</h3>
					<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						<li><a href="careers.html">Careers</a></li>
						<li><a href="help.html">Partner With Us</a></li>
					</ul>
				</div>
				<div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
					<h3>help</h3>
					<ul>
						<li><a href="faq.html">FAQ</a></li>
						<li><a href="login.html">Returns</a></li>
						<li><a href="login.html">Order Status</a></li>
						<li><a href="offers.html">Offers</a></li>
					</ul>
				</div>
				<div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
					<h3>policy info</h3>
					<ul>
						<li><a href="terms.html">Terms & Conditions</a></li>
						<li><a href="privacy.html">Privacy Policy</a></li>
						<li><a href="login.html">Return Policy</a></li>
					</ul>
				</div>
				<div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
					<h3>Menu</h3>
					<ul>
						<li><a href="menu.html">All Day Menu</a></li>
						<li><a href="menu.html">Lunch</a></li>
						<li><a href="menu.html">Dinner</a></li>
						<li><a href="menu.html">Flavours</a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="copyw3-agile">
		<div class="container">
			<p>&copy; 2017 Staple Food. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
		</div>
	</div>
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
