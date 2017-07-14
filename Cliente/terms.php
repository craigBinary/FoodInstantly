<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Términos De Uso</title>
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
		<?php 
			if(isset($_SESSION['id_cliente'])){
				include('inc/navheader.php'); 
			}else{

				include('inc/navlogin.php');			
			}
			?>
			<!--<?php // include('inc/navlogin.php'); ?>
			<?php // include('inc/navheader.php'); ?>-->
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
			<li class="active">Términos</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!-- privacy-page -->
	<div class="privacy about">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Términos y Condiciones</h3>  
			<div class="privacy-w3row">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare turpis ut porta aliquet. Morbi quis dictum lacus. Donec scelerisque lacus nec lobortis tempor. Morbi orci arcu, ullamcorper ut arcu vel, ultricies congue lacus. Phasellus porta cursus tempor. Nunc ultricies sapien nec est ornare pulvinar. Vivamus mollis faucibus purus sed blandit. Praesent fermentum dapibus risus id rutrum. Aliquam rutrum vel nulla eu fringilla.</p>
				<p>Nunc ornare turpis ut porta aliquet. Morbi quis dictum lacus. Donec scelerisque lacus nec lobortis tempor. Morbi orci arcu, ullamcorper ut arcu vel, ultricies congue lacus. Phasellus porta cursus tempor. Nunc ultricies sapien nec est ornare pulvinar. Vivamus mollis faucibus purus sed blandit. Praesent fermentum dapibus risus id rutrum. Aliquam rutrum vel nulla eu fringilla. Curabitur efficitur justo a est tempor, pretium accumsan leo sagittis. Ut imperdiet sapien velit, a auctor neque laoreet sed. Praesent ornare nulla sit amet ullamcorper vulputate. Suspendisse vitae magna finibus, egestas eros quis, ornare risus. Duis magna ex, ultrices quis tellus non, commodo eleifend odio. Donec et faucibus risus. Aliquam laoreet justo sapien. </p>
				<h5>PRICES AND PAYMENT</h5>  
				<p>Maecenas malesuada leo dui, at venenatis ligula sodales ut. Cras a feugiat orci. </p>
				<p>Pellentesque metus enim, aliquet eu felis sed, pretium ultrices ante convallis nec turpis.</p>
				<p>Phasellus imperdiet nibh et lorem tincidunt aliquam. Integer elementum purus non venenatis volutpat. Curabitur sit amet neque sed arcu pretium iaculis. Phasellus posuere egestas tortor a molestie. Nulla sed urna dignissim, maximus magna et, elementum metus. Ut dolor lorem, mattis eu consectetur non, euismod quis nulla. </p>			
				<h5>SECURITY</h5>  
				<p>Phasellus imperdiet nibh et lorem tincidunt aliquam. Integer elementum purus non venenatis volutpat. Curabitur sit amet neque sed arcu pretium iaculis. Phasellus posuere egestas tortor a molestie. Nulla sed urna dignissim, maximus magna et, elementum metus. Ut dolor lorem, mattis eu consectetur non, euismod quis nulla. </p>
				<p>Donec scelerisque lacus nec lobortis tempor donec et faucibus risus. Aliquam laoreet justo sapien. </p>
				<p>Pellentesque quis sagittis est. Nam placerat ante at nunc ornare, sed faucibus odio interdum. Nam viverra, purus ac ullamcorper convallis, lorem erat consequat enim, at pharetra magna. </p>
				<h5>ORDER CONDITIONS, DELIVERY</h5>  
				<p>Maecenas malesuada leo dui, at venenatis ligula sodales ut. Cras a feugiat orci. </p>
				<p>Pellentesque metus enim, aliquet eu felis sed, pretium ultrices ante convallis nec turpis.</p>
			</div>
		</div>
	</div>
	<!-- //privacy-page -->  
	
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