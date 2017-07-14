<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Cambio De Contraseña</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons --> 

<!-- //Custom Theme files --> 
<!-- js Falta agregar el js para md5-->
<script src="js/md5.js"></script>
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
				<h2>Delicious food from the <br> <span>Best Chefs For you.</span></h2> 
			</div>
		</div>
	</div>
	<div class="container">
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Cambio De Contraseña</li>
		</ol>
	</div>
	<?php
	include ('inc/claseCliente.php'); 
	$mostrar = new claseCliente();
	$id_cliente=$_SESSION['id_cliente'];
	$contraseña=$mostrar->mostrarContraseña($id_cliente);
	?>
	<script>
		function validaPass(){
			var pass = document.getElementById("actual_pass").value;
			var pass1= CryptoJS.MD5(pass);
			var pass2="<?php echo $contraseña; ?>";
			pass1=String(pass1);
			pass2=String(pass2);
			//alert(pass2);
			if (pass1.length == 0 || pass2.length == 0 ) {
			    alert("Primero debes ingresar la contraseña y confirmar");
			    return false;
			}
			if (pass1 !== pass2) {
				alert("La contraseña debe coincidir con la actual");
			  
			  return false;			
		    }

		}
		function validaIgualdad(){

			var p1 = document.getElementById("nueva_pass").value;
  			var p2 = document.getElementById("nueva_pass2").value;
  			if (p1.length == 0 || p2.length == 0 ) {
			    alert("Primero debes ingresar la contraseña y confirmar");
			    return false;
			}
			if (p1 != p2) {
			  alert("La contraseña debe coincidir");
			  return false;
		    }
		}
	</script>
	<div class="login-page about">
	    <div class="container">
		      <h3 class="w3ls-title w3ls-title1">Cambio De Contraseña</h3>
		      <div class="login-agileinfo">
		        <form action="cambioContraseña.php" method="post" onsubmit="return validaIgualdad(document.form);">          
		            <input class="agile-ltext" type="password" value="" name="actual_pass" id="actual_pass" placeholder="Ingresa tu contraseña actual" required="" onblur="validaPass()">
		            <input class="agile-ltext" type="password" name="nueva_pass" id="nueva_pass"  placeholder="Ingresa nueva contraseña" required="">
		            <input class="agile-ltext" type="password" name="nueva_pass2" id="nueva_pass2" placeholder="Confirma nueva contraseña" required="">
		            <input type="submit" value="Editar Contraseña" name="editarContraseña">
		        </form>       
		      </div>
	    </div>
    </div>
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
</body>
</html>
<?php
	//include ('inc/claseCliente.php'); 
	//$mostrar = new claseCliente();
	if(isset($_POST['editarContraseña'])){
	    if(!empty($_POST['actual_pass']) && !empty($_POST['nueva_pass']) && !empty($_POST['nueva_pass2'])){
	    	$contraseña=$_POST['nueva_pass'];
			$contraseña= md5($contraseña);

			if($mostrar->cambiarContraseña($id_cliente,$contraseña)){
				echo"<script>
		    		alert('Contraseña actualizada.');
		    		window.location.href='index.php';
		    		</script>";

			}else{
				echo"<script>
		    		alert('Error al actualizar la contraseña.');
		    		window.location.href='cambioContraseña.php';
		    		</script>";

			}

		}
	}		
	?>
