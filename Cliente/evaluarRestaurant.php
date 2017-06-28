<!DOCTYPE html>
<html lang="es">
<head>
<title>Mis Pedidos</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link href="css/estrellas.css" type="text/css" rel="stylesheet" media="all">  
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
<script>
	function validar(){
		
		 if ($('input[name="estrellas"]').is(':checked')) {
		
		    return true;
		}else{
			alert("Debes seleccionar estrellas");
		    return false;
		}
	}	
</script>
</head>
<body> 
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
	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="misPedidos.php"><i class="fa fa-file-text-o"></i> Mis Pedidos</a></li>
			<li class="active">Evaluación Restaurant</li>

		</ol>
	</div>
	<script>
		$(function(){
		  $(".accordion-titulo").click(function(e){
		           
		        e.preventDefault();
		    
		        var contenido=$(this).next(".accordion-content");

		        if(contenido.css("display")=="none"){ //open 
		        	$(".accordion-titulo").removeClass("open");
					$(".accordion-content").slideUp(250);	       
		         	contenido.slideDown(250);         
		         	$(this).addClass("open");
		        }
		        else{ //close       
		          contenido.slideUp(250);
		          $(this).removeClass("open");  
		        }

		      });
		});
	</script>
	<div  id="contact" class="contact ">
		<div id="container-main">
			<h3 class="w3ls-title w3ls-title1">Evaluación</h3> 
			<div class="col-md-3 col-sm-3">
				<!--<label class="radio-inline"><input type="radio" name="optradio" >Tarjeta de crédito</label> -->
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="contact-grid agileits">
						<?php $id_restaurant=$_GET['id_restaurant'];
							  $id_cliente=2;	
						 ?>
						<h4 align="center"><?php echo $_GET['nombre_restaurant']; ?> </h4>

						<form action="insertarValoracion.php" method="post" name="form" onsubmit="return validar(document.form);" > 
							<input type="hidden" name="id_restaurant" value="<?php echo $id_restaurant; ?>">
							<input type="hidden" name="id_cliente" value="<?php echo $id_cliente; ?>">
							 	<div class="form-group">
							 		<h3>Valorar con:</h3>
									<h2 class="clasificacion">
									    <input id="radio1" name="estrellas" value="5" type="radio">
									    <label for="radio1">&#9733;</label>
									    <input id="radio2" name="estrellas" value="4" type="radio">
									    <label for="radio2">&#9733;</label>
									    <input id="radio3" name="estrellas" value="3" type="radio">
									    <label for="radio3">&#9733;</label>
									    <input id="radio4" name="estrellas" value="2" type="radio">
									    <label for="radio4">&#9733;</label>
									    <input id="radio5" name="estrellas" value="1" type="radio">
									    <label for="radio5">&#9733;</label>
									</h2>
								</div>
								<noscript>Necesitas tener habilitado javascript para poder evaluar</noscript>
							<!--<input type="hidden" name="estrellas" required="">							 -->
							<textarea maxlength="250" name="opinion" placeholder="Tu opinión" required=""></textarea>
							<div style="text-align:center;">
							<input type="submit" value="Enviar" name="valorar">
							</div>
						</form> 
					</div>
			</div>
			<div class="clearfix"> </div>
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
	<!-- the jScrollPane script -->
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
       <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>