<?php
include('inc/conecta.php');
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
        function atras() {
            window.history.back();
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
  		<form class="form-horizontal" method="post" action="" name="form" >
		<h1>&nbsp;</h1>
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
		<?php
		
			$filas=count($w3ls_item);
			$total= 0;
			$cantidad_p = 0;
			$nombre_plato = array();
			$contiene = array();
				for($i=1; $i <= $filas; $i++){
					
					//print_r($id_plato);
					//echo $quantity[$i];
					//echo $w3ls_item[$i];
					//echo $amount[$i];
					$cantidad_p += (int)($quantity[$i]);
					$total += (int)($quantity[$i] * $amount[$i]);
					
				} 		
				$cantidad_platos=(int)($cantidad_p);
				$total_pago= (int)($total);
			echo '<div class="form-group">			
			  <h2 align="center">Total a pagar: $'.$total_pago.' Pesos</h2> 			
		     </div> ';
		?>
		<div id="mostrarPagoCr" style="display:none;"> 
			<div class="form-group">
			  <label class="col-md-4 control-label" for="ntarjeta">Número de tarjeta:</label>  
			  <div class="col-md-4">
			  <input id="numero_tarjeta" type="text"  class="form-control input-md" required>			    
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
			  <input id="rut_tarjeta" type="text"  class="form-control input-md" required>			    
			  </div>
			</div>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cod_veri">Código Verificación:</label>  
			  <div class="col-md-4">
			  <input id="cod_verificación" type="text"  class="form-control input-md" required>			    
			  </div>
			</div>
		</div>
		<h1>&nbsp;</h1>
		<div class="form-group">
		      <label class="col-md-4 col-xs-3 control-label " for="pago"></label>
		  <div class="col-md-5 col-xs-12 col-sm-6 ">
		      <button id="volver"  class="btn btn-primary" onClick="atras()">Cancelar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      <button id="pagar" name="pagar" class="btn btn-primary" onClick="validar_clave()">Pagar</button>
		  </div>
		</div>
		</form>
		</div>
	</div>
  </body>
</html>

<?php
 

//$quantity -> cantidad de platos
//$w3ls_item -> nombre del plato
//$amount -> precio del plato 
//$total -> monto total a pagar
//$cantidad_platos -> cantidad total de platos
 
 if(isset($_POST['pedido'])){ 
$id_restaurant=(int)($_POST['id_restaurant']);
//$id_restaurant=	$id_restaurant);

 	
 	 
 	
/*
 	 $db = conecta();
 	 $id_cliente=2;
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
}
?>