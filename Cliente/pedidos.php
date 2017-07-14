<?php
session_start();

extract($_POST,EXTR_PREFIX_SAME,"hacerPedido");
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pago</title>
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
    <!-- Bootstrap -->
	 <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/>
     <script src="js/jquery-2.2.3.min.js"></script> 
     <link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"> 
	 <link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet"> 
	<script>
        function cancelar() {
          window.location.href='index.php';
        }

        function eliminar(){

        	$("#staplesbmincart").empty();
        	//$(".sbmincart-item sbmincart-item-changed").empty();
			
        }   

        function pagoOnChange(radio) {
		      if (radio.value == 1){
		           divC = document.getElementById("mostrarPagoCr");
		           divC.style.display = "";

		           divT = document.getElementById("mostrarPagoRc");
		           divT.style.display = "none";

		      }else{

		           divC = document.getElementById("mostrarPagoCr");
		           divC.style.display="none";

		           divT = document.getElementById("mostrarPagoRc");
		           divT.style.display = "";
		      }
		}	

	</script>     
  </head>
  <body>
  <?php   include('inc/navpago.php');  ?>

    <div class="about">
		<div class="container"> 
  		
		<h1>&nbsp;</h1>
		<form  class="form-horizontal" >
		<div class="form-group">
			<div class="col-md-2 ">
				<!--<label class="radio-inline"><input type="radio" name="optradio" >Tarjeta de crédito</label> -->
			</div>
			<div class="col-xs-8 col-sm-12 col-md-8">
				<label class="radio-inline"><input type="radio" name="pago" value="1" onchange="pagoOnChange(this)"><b>Tarjeta de crédito</b></label>
					 <img src="img/ico-visa.png" class="img-rounded" alt="Cinque Terre"> 
				<label class="radio-inline"><input type="radio" name="pago" value="2" onchange="pagoOnChange(this)"><b>Redcompra</b></label>
				<img src="img/ico-redcompra.png" class="img-rounded" alt="Cinque Terre"> 
			</div>			
		</div>
		<h1>&nbsp;</h1>
		
		<?php

			if(isset($_POST['repetir'])){ 


				$total_pago=$_POST['total_pago'];
				$cantidad_platos=$_POST['cantidad_platos'];
				$id_cliente=$_POST['id_cliente'];
				$id_restaurant=$_POST['id_restaurant'];
				$contiene=$_POST['datos'];
				echo '<div class="form-group">			
			  <h2 align="center">Total a pagar: $'.$total_pago.' Pesos</h2> 			
		     </div> ';
			}else{		

			$id_restaurant=(int)($id_restaurant[1]);
			$id_cliente=$_SESSION['id_cliente'];
			$filas=count($w3ls_item);
			$total= 0;
			$cantidad_p = 0;
			
			$contiene = array();
				for($j=1; $j <= $filas; $j++){
 
				$cantidad_p += (int)($quantity[$j]);
				$total += (int)($quantity[$j] * $amount[$j]);

				$contiene[] =array("cantidad"=>$quantity[$j],"id_plato"=>$id_plato[$j],"precio"=>($quantity[$j] * $amount[$j]));
 		
 				}
 		
				$cantidad_platos=(int)($cantidad_p);
				$total_pago= (int)($total);
			echo '<div class="form-group">			
			  <h2 align="center">Total a pagar: $'.$total_pago.' Pesos</h2> 			
		     </div> ';
		    }
		?>
		<h1>&nbsp;</h1>

		<div id="mostrarPagoCr" style="display:none;"> 
			<div class="form-group">
			  <label class="col-md-4 control-label" for="ntarjeta">Número de tarjeta:</label>  
			  <div class="col-md-4">
			  <input id="numero_tarjeta" type="text"  class="form-control input-md" required>			    
			  </div>
			</div>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="sel_emi">Vencimiento:</label>  
			  <div class="col-md-2">
				 <select class="form-control" id="mes">
				 	<option value="" default selected>Mes</option>
				 	<option value="1">01</option>
				 	<option value="2">02</option>
				 	<option value="3">03</option>
				 	<option value="4">04</option>
				 	<option value="5">05</option>
				 	<option value="6">06</option>
				 	<option value="7">07</option>
				 	<option value="8">08</option>
				 	<option value="9">09</option>
				 	<option value="10">10</option>
				 	<option value="11">11</option>
				 	<option value=12>12</option>
				 </select>			    
			  </div>
			
			  <div class="col-md-2	">
				 <select class="form-control" id="año">
				 	<option value="" default selected>Año</option>
				 	<option value="1">2017</option>
				 	<option value="2">2018</option>
				 	<option value="3">2019</option>
				 	<option value="4">2020</option>
				 	<option value="5">2021</option>
				 	<option value="6">2022</option>
				 	<option value="7">2023</option>
				 	<option value="8">2024</option>
				 	<option value="9">2025</option>
				 	<option value="10">2026</option>
				 	<option value="11">2027</option>
				 	<option value=12>2028</option>
				 </select>			    
			  </div>
			</div>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cod_veri">Código Verificación:</label>  
			  <div class="col-md-4">
			  <input id="cod_verificación" type="text"  class="form-control input-md" required>			    
			  </div>
			</div>
		</div>
		<div id="mostrarPagoRc" style="display:none;">
			<div class="form-group">
			  <label class="col-md-4 control-label" for="sel_emi">Emisor:</label>  
			  <div class="col-md-4">
				 <select class="form-control" id="sel_emisor">
				 	<option value="" default selected>Seleccione banco</option>
				 	<option value="1">BANCO SANTANDER</option>
				 	<option value="2">BANCO SANTANDER BANEFE</option>
				 	<option value="3">BBVA</option>
				 	<option value="4">BANCO DE CHILE</option>
				 	<option value="5">BANCOESTADO</option>
				 	<option value="6">BANCO BICE</option>
				 	<option value="7">BANCO SECURITY</option>
				 	<option value="8">BANCO CONSORCIO</option>
				 	<option value="9">BANCO RIPLEY</option>
				 	<option value="10">BANCO INTERNACIONAL</option>
				 	<option value="11">SCOTIABANK</option>
				 	<option value=12>COOPEUCH</option>
				 </select>			    
			  </div>
			</div>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="RUT">Ingrese RUT:</label>  
			  <div class="col-md-4">
			  <input id="rut_tarjeta" type="text"  class="form-control input-md" required="true">			    
			  </div>
			</div>
			
		</div>
		</form>
		<h1>&nbsp;</h1>
		<form action="pago.php" method="post" class="form-horizontal" name="form" onsubmit="return eliminar(document.form);">
		<input type="hidden" name="total_pago" value="<?php echo $total_pago ?>">
		<input type="hidden" name="id_cliente" value="<?php echo $id_cliente ?>">
		<input type="hidden" name="id_restaurant" value="<?php echo $id_restaurant ?>">
		<input type="hidden" name="cantidad_platos" value="<?php echo $cantidad_platos ?>">	
		<?php 
		if(isset($_POST['repetir'])){
		 echo '<input type="hidden" name="datos" value="'.$contiene.'">';
		}else{
		 echo '<input type="hidden" name="datos" value="'.base64_encode(serialize($contiene)).'">';
		}
		?>	
		
		<div class="form-group">
		      <label class="col-md-4 col-xs-3 control-label " for="pago"></label>
		  <div class="col-md-5 col-xs-12 col-sm-6 ">
		      <button type="button" id="volver" class="btn btn-primary" onClick="cancelar()">Cancelar Pago</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <button type="submit" id="pagar" name="pagar" class="btn btn-primary" value="Submit">Pagar Pedido</button>
		  </div>
		</div>		
		</form>
		</div>
	</div>	
	
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
	<script>
		$(document).ready(function(){

			$("button#pagar").click(function(){
				$("button.sbmincart-remove").remove();
			 	$("li").remove(".sbmincart-item");
			 	$("li").remove(".sbmincart-item sbmincart-item-changed");
	   			
			})

		}) 
	</script>
  </body>
</html>

<?php
 

//$quantity -> cantidad de platos
//$w3ls_item -> nombre del plato
//$amount -> precio del plato 
//$total -> monto total a pagar
//$cantidad_platos -> cantidad total de platos
 
 //if(isset($_POST['pagar'])){ 
//$id_restaurant=(int)($_POST['id_restaurant']);
//$id_restaurant=	$id_restaurant);

 	
 	 
 	
/*
 	 $db = conecta();
 	 $id_cliente=$_SESSION['id_cliente'];
 	 $estado_solicitud='pagado';  
 	$insert = "insert INTO bd_restorant.tbl_solicitud (id_solicitud,id_cliente,id_restaurant,fecha_hora, total_cuenta, cantidad, estado_solicitud) VALUES
 	 (NULL,:id_cliente, :id_restaurant, NULL, :total_pago, :cantidad_platos, :estado_solicitud) ";

 	$resultado=$db->prepare($insert);
 	if($resultado->execute(array(":id_cliente"=>$id_cliente,":id_restaurant"=>$id_restaurant,":total_pago"=>$total_pago,":cantidad_platos"=>$cantidad_platos,":estado_solicitud"=>$estado_solicitud)) && $resultado->rowCount()>0 ){
 		
        $id_solicitud=$db->lastInsertId();
        
 	}else{
 		echo "Guatio affected row";
 	}	

 	for($j=1; $j <= $filas; $j++){
	
	echo "<br>";	
	$contiene[] =array("cantidad"=>$quantity[$j],"id_plato"=>$id_plato[$j],"precio"=>($quantity[$j] * $amount[$j]),"id_solicitud"=>$id_solicitud);
 		
 	}
 	print_r($contiene);

 	foreach ($contiene as $dato){

		$cantidad = $dato["cantidad"];		
		$id_plato = $dato["id_plato"];		
		$precio = $dato["precio"];
		$id_solicitud = $dato["id_solicitud"];

		$insert_detalle = "insert INTO bd_restorant.tbl_detalle_solicitud (id_detalle_solicitud, cantidad, precio, id_plato, id_solicitud) VALUES (NULL, :cantidad ,:precio, :id_plato ,:id_solicitud)";
		$resultado_detalle=$db->prepare($insert_detalle);
 	    if($resultado_detalle->execute(array(":cantidad"=>$cantidad,":id_plato"=>$id_plato,":precio"=>$precio,":id_solicitud"=>$id_solicitud)) && $resultado_detalle->rowCount()>0 ){
 		echo "<br>";
        echo "se incertó el detalle";
        
 	    }else{
 	    	echo "<br>";
 		echo "guatio insert detalle";
 	    }	
		
	} */
//}
?>