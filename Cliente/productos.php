<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="es">
<head>
<title>Menú de platos</title>
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
	<div class="banner about-w3bnr">
		<!-- header -->
		<div class="header">
			<?php include('inc/navlogin.php'); ?>
			<?php include('inc/navheader.php'); ?>
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
			<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">Productos</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- products -->
	<div class="products">	 
		<div class="container">
			<div class="col-md-12 product-w3ls-right"> 
				<div class="product-top">
					<h4>Hazla Corta</h4>
					<ul> 
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tipo de comida<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="productos.php?id_restaurant=<?php echo $_GET['id_restaurant']; ?>">TODOS</a></li>
								<?php
								include ('inc/claseCliente.php'); 
								$lista= new claseCliente();
								$id_restaurant = $_GET['id_restaurant'];
								$lista->listarTipoPlato($id_restaurant);
								
								?>
							</ul> 
						</li>
					</ul> 
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">

				<?php
					if(!isset($_GET['id_tipo'])){
						$lista->listarPlatos($id_restaurant);
					}else{
						
						$id_tipo=$_GET['id_tipo'];
						$lista->listarPlatos2($id_restaurant,$id_tipo);
					}

				?>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div> 
		</div>
	</div>
	<!-- //products --> 
	
	<!-- dishes -->
	<div class="w3agile-spldishes">
		<div class="container">
			<h3 class="w3ls-title">Special Foods</h3>
			<div class="spldishes-agileinfo">
				<div class="col-md-3 spldishes-w3left">
					<h5 class="w3ltitle">Staple Specials</h5>
					<p>Vero vulputate enim non justo posuere placerat Phasellus mauris vulputate enim non justo enim .</p>
				</div> 
				<div class="col-md-9 spldishes-grids">
					<!-- Owl-Carousel -->
					<div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g1.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Duis congue</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g2.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Duis congue</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g3.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Duis congue</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g4.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Duis congue</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g5.jpg" alt=""/>
							<div class="agile-dish-caption">
								<h4>Duis congue</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a> 
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g1.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Duis congue</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g2.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Duis congue</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g3.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Duis congue</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
					</div> 
				</div>  
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //dishes --> 
	<!-- modal -->
	<div class="modal video-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
				</div>
				<section>
          		<div class="modal-body">
				<!-- aquí va la llamada de la vista previa  -->
          		</div>
          		</section> 
			</div>
		</div>
	</div> 
	<!-- //modal -->
	
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
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" id="sourcecode">
		$(function()
		{
			$('.scroll-pane').jScrollPane();
		});
	</script>
	<!-- //the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script> <!-- the mouse wheel plugin --> 
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
    <script type="text/javascript" src="js/ajax_previa.js"></script>   
</body>
</html>