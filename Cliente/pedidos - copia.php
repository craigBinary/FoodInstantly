<?php
include('inc/conecta.php');
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
	</script>     
  </head>
  <body>
  <?php   include('inc/navpago.php');  ?>

    <div class="about">
		<div class="container"> 
  		<form class="form-horizontal" method="post" action="" name="form" >
		<h1>&nbsp;</h1>
		<div class="form-group">
			<div class="col-md-4 ">
				<!--<label class="radio-inline"><input type="radio" name="optradio" >Tarjeta de crédito</label> -->
			</div>
			<div class="col-md-4 col-xs-4 ">
				<label class="radio-inline"><input type="radio" name="optradio" >Tarjeta de crédito</label>
					 <img src="img/ico-visa.png" class="img-rounded" alt="Cinque Terre"> 
				<label class="radio-inline"><input type="radio" name="optradio">Redcompra</label>
				<img src="img/ico-redcompra.png" class="img-rounded" alt="Cinque Terre"> 
			</div>
		</div>
		<?
		if(isset($_POST['pedido'])){ 
			
		}	
		?>
		<div class="form-group">
			<div class="col-md-4">
			  <h1 align="center"><small>Total a pagar</small></h1>  
			</div>
		</div>
<!-- Button -->
		<div class="form-group">
		      <label class="col-md-4 control-label" for="registrar"></label>
		  <div class="col-md-4">
		      <button id="volver"  class="btn btn-success" onClick="atras()">Volver Atrás</button>
		      <button id="registrar" name="registrar" class="btn btn-success" onClick="validar_clave()">Crear Usuario</button>
		  </div>
		</div>
		</form>
		</div>
	</div>
  </body>
</html>

<?php
 extract($_POST,EXTR_PREFIX_SAME,"hacerPedido");

//$quantity -> cantidad de platos
//$w3ls_item -> nombre del plato
//$amount -> precio del plato 
//$total -> monto total a pagar
//$cantidad_platos -> cantidad total de platos
 
 if(isset($_POST['pedido'])){ 
$id_restaurant=(int)($_POST['id_restaurant']);
//$id_restaurant=	$id_restaurant);
$filas=count($w3ls_item);

  $total= 0;
  $cantidad_p = 0;
 $nombre_plato = array();
 $contiene = array();
for($i=1; $i <= $filas; $i++){
	
	echo "<br>";
	//print_r($id_plato);
	//echo $quantity[$i];
	//echo $w3ls_item[$i];
	//echo $amount[$i];
	$cantidad_p += (int)($quantity[$i]);
	$total += (int)($quantity[$i] * $amount[$i]);
	echo "<br>";
	
 		//array_push($nombre_plato, $w3ls_item[$j]) ;
 	} 	
 	
 	$total_pago= (int)($total);
 	echo $total_pago;
 	echo "<br>";
 	 $cantidad_platos=(int)($cantidad_p);
 	echo $cantidad_platos;
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