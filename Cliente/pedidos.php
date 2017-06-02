

<?php


 extract($_POST,EXTR_PREFIX_SAME,"hacerPedido");


  echo "<br>";
  $total= 0;
 $nombre_plato = array();
for($j=1; $j <= count($w3ls_item); $j++){
	echo $quantity[$j];
	echo $w3ls_item[$j];
	echo $amount[$j];
	$total += ($quantity[$j] * $amount[$j]);
	echo "<br>";

 		//array_push($nombre_plato, $w3ls_item[$j]) ;
 	}
 	echo $total;

 	$insert = "INSERT INTO bd_restorant.tbl_solicitud (id_solicitud, id_cliente, id_restaurant, fecha_hora, total_cuenta, cantidad, estado_solicitud) VALUES ("",2,$id_restaurant,,,,) ";

 	
?>