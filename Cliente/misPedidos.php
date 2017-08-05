<?php
include('seguridad.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Mis Pedidos</title>
<link rel="shortcut icon" type="image/x-icon" href="img/ico.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
<link href="css/misPedidos.css" type="text/css" rel="stylesheet" media="all"> 
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
	<div class="banner about-w3bnr">
		<!-- header -->
		<div class="header">
			
			<?php include('inc/navheader.php'); ?>
		</div>
		<!-- //header-end --> 
		<!-- banner-text -->
		<div class="banner-text">	
			<div class="container">
				<h2>Ahorra tiempo haciendo tu pedido <br> <span>llegar y comer!</span></h2>
			</div>
		</div>
	</div>
	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Mis Pedidos</li>
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
		        }else{ //close       
		          contenido.slideUp(250);
		          $(this).removeClass("open");  
		        }

		      });
		});
	</script>
	<div class="faq-w3agile about">
		<div id="container-main">
			<h3 class="w3ls-title w3ls-title1">Mis Pedidos</h3> 
			<div class="accordion-container">
				<?php
				include ('inc/claseCliente.php'); 
				$mostrar = new claseCliente();
				$id_cliente=$_SESSION['id_cliente'];
				$mostrar->mostrarPedidos($id_cliente);
				?>
							 
			</div> 
		</div>
	</div>	 
	<?php include('inc/footer.php'); ?>
	<!-- //footer -->   
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
        w3ls.render();
        <?php
        if(isset($_GET['limpiar'])){ ?> 
        	w3ls.reset(true);
         <?php } ?> 
       
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
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
	<script type="text/javascript" id="sourcecode">
		$(function()
		{
			$('.scroll-pane').jScrollPane();
		});
	</script>
	<!-- //the jScrollPane script -->  
	<!-- Owl-Carousel-JavaScript -->
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script> <!-- the mouse wheel plugin -->
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
	<!-- //smooth-scrolling-of-move-up -->  
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/ajax_tablas.js"></script>
</body>
</html>